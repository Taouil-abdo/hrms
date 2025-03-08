<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;



class Roles extends Component
{
    

    public $roles;
    public $name, $guradname,$roleId;
    public $isEditing = false;

    use WithPagination;
    

    public function render()
    {
    $this->roles = Role::all();  
    return view('livewire.roles.roles')->layout('layouts.app');  
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $validated['guard_name'] = 'web';
        Role::create($validated);
        session()->flash('message', 'Role created successfully!');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $role->id;
        $this->name = $role->name;
        $this->isEditing = true;

        return view('livewire.job.update-job')->layout('layouts.app');
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
        ]);
        $validated['guard_name'] = 'web';

        Role::find($this->roleId)->update($validated);
        session()->flash('message', 'role updated successfully!');
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        session()->flash('message', 'role deleted successfully!');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->roleId = null;
    }
}

