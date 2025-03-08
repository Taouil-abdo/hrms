<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contract;

class Contracts extends Component
{
    public $typeContract, $document, $startDate, $endDate;
    public $contractId;
    public $contracts;
    public $isEditing = false;

    public function render()
    {
        $this->contracts = Contract::all();
        return view('livewire.contract.contract')->layout('layouts.app');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function store(){
        $validated = $this->validate([
            'typeContract' => 'required|string|max:255',
            'document' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $contract = Contract::create($validated);
        session()->flash('message', 'Contract created successfully!');
        $this->resetInputFields();

    }

    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        $this->contractId = $contract->id;
        $this->typeContract = $contract->typeContract;
        $this->document = $contract->document;
        $this->startDate = $contract->startDate;
        $this->endDate = $contract->endDate;
        $this->isEditing = true;

        return view('livewire.contract.contract')->layout('layouts.app');
    }

    public function update()
    {
        $validated = $this->validate([
            'typeContract' => 'required|string|max:255',
            'document' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        Contract::find($this->contractId)->update($validated);
        session()->flash('message', 'Contract updated successfully!');
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function destroy($id)
    {
        Contract::find($id)->delete();
        session()->flash('message', 'Contract deleted successfully!');
    }

    private function resetInputFields()
    {
        $this->typeContract = '';
        $this->document = '';
        $this->startDate = '';
        $this->endDate = '';
    }

}
