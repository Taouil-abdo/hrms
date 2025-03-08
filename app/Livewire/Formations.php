<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Formation;
use App\Models\User;
use Livewire\WithPagination;

class Formations extends Component
{
    use WithPagination;

    public $title, $description, $location, $certificate, $start_date, $end_date, $user_id;
    public $isEditing = false;
    public $formationId;
    public $search = '';

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string',
        'certificate' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'user_id' => 'required|exists:users,id',
    ];

    public function mount()
    {
        $this->resetPage();
    }

    public function render()
    {
        $formations = $this->search
            ? Formation::where('title', 'like', '%' . $this->search . '%')
                          ->orWhere('description', 'like', '%' . $this->search . '%')
                          ->paginate(10)
            : Formation::paginate(10);

        return view('livewire.formation.formations', [
            'formations' => $formations,
            'employees' => User::all(),
        ])->layout('layouts.app');
    }

    public function store()
    {
        $this->validate();

        Formation::create([
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'certificate' => $this->certificate,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => $this->user_id,
        ]);

        session()->flash('message', 'Formation created successfully!');

        $this->resetFields();
    }

    public function edit($id)
    {
        $formation = Formation::findOrFail($id);
        $this->formationId = $id;
        $this->title = $formation->title;
        $this->description = $formation->description;
        $this->location = $formation->location;
        $this->certificate = $formation->certificate;
        $this->start_date = $formation->start_date;
        $this->end_date = $formation->end_date;
        $this->user_id = $formation->user_id;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        Formation::find($this->formationId)->update([
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'certificate' => $this->certificate,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => $this->user_id,
        ]);

        session()->flash('message', 'Formation updated successfully!');

        $this->resetFields();
    }

    public function destroy($id)
    {
        Formation::find($id)->delete();

        session()->flash('message', 'Formation deleted successfully!');
    }

    public function resetFields()
    {
        $this->reset(['title', 'description', 'location', 'certificate', 'start_date', 'end_date', 'user_id', 'isEditing', 'formationId']);
    }
}
