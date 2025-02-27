<?php

namespace App\Livewire;

use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.users');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function store(){
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create($validated);
        $user->syncRoles($request->Role);
        session()->flash('message', 'User created successfully!');
        $this->resetInputFields();

    }
}
