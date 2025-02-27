<?php

namespace App\Http\Controllers;

use App\Models\contract;
use App\Http\Requests\StorecontractRequest;
use App\Http\Requests\UpdatecontractRequest;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = contract::all();
        return view('EntityManagements.contract', compact('contracts'));
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
    public function store(StorecontractRequest $request)
    {
        $request->validated();
        $result = contract::create($request->validated());
        return redirect()->route('contract.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(contract $contract)
    {
        return redirect()->route('contract.index', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contract $contract)
    {
        return view('EntityManagements.contract', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecontractRequest $request, contract $contract)
    {
        $request->validated();
        $result = $contract->update($request->validated());
        return redirect()->route('contract.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contract $contract)
    {
        $result = $contract->delete();
        return redirect()->route('contract.index');
    }
}
