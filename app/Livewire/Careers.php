<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Career;

class Careers extends Component
{
    public $users;
    public $selectedUser;
    public $careers = [];

    public function mount()
    {
        $this->users = User::all();
    }

    public function show($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->Careers = $this->selectedUser->Careers;
    }

    public function render()
    {
        return view('livewire.career')->layout('layouts.app');
    }
}
