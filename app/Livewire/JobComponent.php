<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Joob;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class JobComponent extends Component
{
    public $jobs;
    public $title, $description, $jobId;
    public $isEditing = false;

    use WithPagination;


    public function render()
    {
    $this->jobs = Joob::all();  

    return view('livewire.job.joob')->layout('layouts.app');  
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function store()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        Joob::create($validated);
        session()->flash('message', 'Job created successfully!');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $job = Joob::findOrFail($id);
        $this->jobId = $job->id;
        $this->title = $job->title;
        $this->description = $job->description;
        $this->isEditing = true;

        return view('livewire.job.update-job')->layout('layouts.app');
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        Joob::find($this->jobId)->update($validated);
        session()->flash('message', 'Job updated successfully!');
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function destroy($id)
    {
        Joob::findOrFail($id)->delete();
        session()->flash('message', 'Job deleted successfully!');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->salary = '';
        $this->jobId = null;
    }
}
