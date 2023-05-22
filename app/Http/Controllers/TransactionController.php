<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectors = User::get();
        $types = TransactionType::get();
        return view('admin.transaction.index', compact('collectors', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'type' => 'required|string',
            'sum' => 'required|boolean',
            'amount' => 'required|numeric|min:1',
            'description' => 'nullable|string',
        ]);

        $transactionType = TransactionType::findOrFail($validated['type']);

        $transaction = new Transaction();
        $transaction->user_id = $validated['user_id'];
        $transaction->amount = $validated['amount'];
        $transaction->type = $transactionType->type;
        $transaction->sum = $validated['sum'];
        $transaction->description = $validated['description'];
        $transaction->save();

        return back()->with('success', 'Transaction Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $collector = User::findOrFail($user_id);
        return view('admin.transaction.show', compact('collector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
