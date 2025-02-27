<?php

namespace App\Http\Controllers;

use App\Models\departement;
use App\Http\Requests\StoredepartementRequest;
use App\Http\Requests\UpdatedepartementRequest;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::all();
        return view('EntityManagements.departement', compact('departements'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredepartementRequest $request)
    {
        $result = Departement::create($request->validated());
        return redirect()->route('departement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(departement $departement)
    {

        return redirect()->route('departement.index', compact('departement'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdatedepartementRequest $departement)
    {
        return view('EntityManagements.departement', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedepartementRequest $request, departement $departement)
    {
        $departement->update($request->validated());
        return redirect()->route('departement.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departement $departement)
    {
        $departement->delete();
        return redirect()->route('departement.index');
    }
}
