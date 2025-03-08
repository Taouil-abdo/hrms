<?php
namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Career;
use Livewire\Component;
use App\Models\Contract;
use App\Models\Formation;
use App\Models\Departement;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Users extends Component
{
    use WithPagination, WithFileUploads;

    public $fullname, $email, $password, $image, $phone, $birthday, $address, 
           $recruitment_date, $salary, $status, $department_id, $role_id, 
           $contract_id, $formation_id, $employeeId;

    public $isEditing = false;
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.users.users', [
            'users' => User::paginate(10),
            'departments' => Departement::all(),
            'roles' => Role::all(),
            'contracts' => Contract::all(),
            'formations' => Formation::all(),
        ])->layout('layouts.app'); 
    }

    public function create()
    {
        $this->resetFields();
        $this->isEditing = false;
    }

   
    public function store()
{
    $user = auth()->user();

    $recruitmentDate = Carbon::parse($this->recruitment_date);
    $currentDate = Carbon::now();

    $yearsWorked = $recruitmentDate->diffInYears($currentDate);
    $monthsWorked = $recruitmentDate->diffInMonths($currentDate) % 12;

    if ($yearsWorked >= 1) {
        $congeBalance = 18 + (18 * ($yearsWorked - 1)) + (0.5 * $yearsWorked);
    } else {
        $congeBalance = $monthsWorked * 1.5;
    }

    $validated = $this->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . ($this->employeeId ?? 'NULL'),
        'password' => $this->isEditing ? 'nullable' : 'required|min:6',
        'phone' => 'required',
        'birthday' => 'required',
        'address' => 'required|string',
        'recruitment_date' => 'required',
        'salary' => 'required',
        'status' => 'required',
        'department_id' => 'required',
        'role_id' => 'required|exists:roles,id',
        'contract_id' => 'required|exists:contracts,id',
        'image' => 'nullable|image|max:2048',
    ]);

    $validated['leaveBalance'] = $congeBalance;

    if ($this->image) {
        $validated['image'] = $this->image->store('users', 'public');
    }

    $validated['password'] = Hash::make($validated['password']);

    $user = User::create($validated);

    if ($user) {
        $department = Departement::find($validated['department_id'])->name;
        $role = Role::find($validated['role_id'])->name;
        $contract = Contract::find($validated['contract_id'])->typeContract;

        $careerData = [
            'user_id' => $user->id,
            'rectement_date' => $user->recruitment_date,
            'salary' => $user->salary,
            'department' => $department,
            'role' => $role,
            'contract' => $contract,
        ];

        Career::create($careerData);
    }

    session()->flash('message', 'Employee created successfully!');
    $this->resetFields();
}

    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->fill($user->toArray());
        $this->employeeId = $id;
        $this->isEditing = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . ($this->employeeId ?? 'NULL'),
            'password' => $this->isEditing ? 'nullable' : 'required|min:6',
            'phone' => 'required',
            'birthday' => 'required|date',
            'address' => 'required|string',
            'recruitment_date' => 'required|date',
            'salary' => 'required|numeric',
            'status' => 'required',
            'department_id' => 'required|exists:departments,id',
            'role_id' => 'required|exists:roles,id',
            'contract_id' => 'required|exists:contracts,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        if ($this->image) {
            $oldImage = User::find($this->employeeId)->image;
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
            $validated['image'] = $this->image->store('users', 'public');
        }

        User::find($this->employeeId)->update($validated);
        session()->flash('message', 'User updated successfully!');
        $this->resetFields();
        $this->isEditing = false;
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'User deleted successfully!');
    }

    private function resetFields()
    {
        $this->reset(['fullname', 'email', 'password', 'image', 'phone', 'birthday', 'address', 'recruitment_date', 'salary', 'status', 'department_id', 'role_id', 'contract_id', 'formation_id', 'employeeId']);
    }
}
