<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::all();
        return view('loan.index', compact('loan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'borrower_id' => 'required|exists:borrowers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        
        Loan::create($validated);

        return redirect('loan')->with('success', 'Loan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
