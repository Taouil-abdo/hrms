<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Departement;

class Departements extends Component
{

    public $departements;
    public $name, $description, $departementId;
    public $isEditing = false;

    public function render()
    {
        $this->departements = Departement::all();
        return view('livewire.departement.departement')->layout('layouts.app');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function store(){
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $departement = Departement::create($validated);
        session()->flash('message', 'Departement created successfully!');
        $this->resetInputFields();

    }
    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        $this->departementId = $departement->id;
        $this->name = $departement->name;
        $this->description = $departement->description;
        $this->isEditing = true;

        return view('livewire.departement.update-departement')->layout('layouts.app');
    }
    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
        ]);

        Departement::find($this->departementId)->update($validated);
        session()->flash('message', 'Departement updated successfully!');
        $this->resetInputFields();
    }
    public function destroy($id)
    {
        Departement::find($id)->delete();
        session()->flash('message', 'Departement deleted successfully!');
    }
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
    }
}
