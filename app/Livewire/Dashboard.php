<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\Contract;
use App\Models\Formation;
use App\Models\Departement;

class Dashboard extends Component
{
    public function render()
{
    return view('livewire.Dashboard', [
        'users' => User::paginate(10),
        'departments' => Departement::all(),
        'roles' => Role::all(),
        'contracts' => Contract::all(),
        'formations' => Formation::all(),
    ])->layout('layouts.app'); 
}
}
