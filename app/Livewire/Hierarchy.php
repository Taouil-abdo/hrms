<?php

namespace App\Livewire;

use Livewire\Component;

class Hierarchy extends Component
{
    public function render()
    {
        $hierarchy = User::All();
        return view('livewire.hierarchy');
    }


}
