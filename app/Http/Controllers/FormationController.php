<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::all();
        return view('EntityManagements.formation', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormationRequest $request)
    {
        $request->validated();
        $result = Formation::create($request->validated());
        return redirect()->route('formation.index');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        return redirect()->route('formation.index', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        return view('EntityManagements.formation', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormationRequest $request, Formation $formation)
    {
        $request->validated();
        $result = $formation->update($request->validated());
        return redirect()->route('formation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        $result = $formation->delete();
        return redirect()->route('formation.index');
    }
}
