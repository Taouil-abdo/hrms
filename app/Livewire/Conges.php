<?php 

namespace App\Livewire;

use App\Models\User;
use App\Models\Conge;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Conges extends Component
{
    public $users;
    public $selectedUser;
    public $Conges = [];
    public $user_id;
    public $start_date;
    public $end_date;
    public $type;
    public $manager_approval;
    public $hr_approval;
    public $isEditing = false;
    public $CongeId;
    public $CongesUser;

    // public function mount()
    // {
    //     $this->CongesUser = User::all();
    // }

    public function render()
    {
        $user = auth()->user();
        $this->CongesUser = $user->Conges;  

        $this->Conges = Conge::all();
        return view('livewire.conger.conger')->layout('layouts.app');
    }

    public function show($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->Conges = $this->selectedUser->Conges;
    }

    public function store()
    {
        $this->user_id = Auth::id();

        $user = auth()->user();
        $startDate = $user->recruitment_date;
        $currentDate = now();
        $yearsOfService = $currentDate->diffInYears($startDate);
        $monthsOfService = $currentDate->diffInMonths($startDate) % 12;

        dd($startDate);
        // dd('monthsOfService:',$monthsOfService);

        $validated = $this->validate([
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|string',
            // 'Days' => 'required',

        ]);

        Conge::create($validated);

        session()->flash('message', 'Conge created successfully!');

        $this->resetFields();
    }

    public function edit($id)
    {
        $Conge = Conge::findOrFail($id);
        $this->user_id = $Conge->user_id;
        $this->start_date = $Conge->start_date;
        $this->end_date = $Conge->end_date;
        $this->type = $Conge->type;
        $this->Days = $Conge->Days;
        $this->manager_approval = $Conge->manager_approval;
        $this->hr_approval = $Conge->hr_approval;
        $this->CongeId = $id;
        $this->isEditing = true;
    }

    public function update()
    { 


        $validated = $this->validate([
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|string',
            'Days' => 'required',
            'manager_approval' => 'sometimes|boolean',
            'hr_approval' => 'sometimes|boolean',
        ]);

        $Conge = Conge::find($this->CongeId);
        $Conge->update($validated);

        session()->flash('message', 'Conge updated successfully!');

        $this->resetFields();
    }

    public function destroy($id)
    {
        Conge::find($id)->delete();

        session()->flash('message', 'Conge deleted successfully!');
    }

    public function resetFields()
    {
        $this->reset(['user_id', 'start_date', 'end_date', 'type', 'manager_approval', 'hr_approval', 'isEditing', 'CongeId']);
    }

    public function approve($id)
    {
        $Conge = Conge::find($id);
        $Conge->update([
            'manager_approval' => 'approved',
        ]);

        session()->flash('message', 'Conge approved successfully!');
    }

    public function reject($id)
    {
        $Conge = Conge::find($id);
        $Conge->update([
            'manager_approval' => 'rejected',
        ]);

        session()->flash('message', 'Conge rejected successfully!');
    }

    public function hrApprove($id)
    {
        $Conge = Conge::find($id);
        $Conge->update([
            'hr_approval' => 'approved',
        ]);

        session()->flash('message', 'Conge approved by HR successfully!');
    }

    public function hrReject($id)
    {
        $Conge = Conge::find($id);
        $Conge->update([
            'hr_approval' => 'rejected',
        ]);

        session()->flash('message', 'Conge rejected by HR successfully!');
    }

    public function showCongeForUser()
{
    $user = auth()->user();

    if ($user) {
        $this->CongesUser = $user->Conges;  
    
        session()->flash('message', 'Conge records retrieved successfully!');
    } else {
        session()->flash('message', 'User not found!');
    }
}

}
