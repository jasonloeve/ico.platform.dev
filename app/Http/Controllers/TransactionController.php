<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allTransactions = Transaction::latest()->where('user_id', auth()->id())->get();
        // return response()->json($allTransactions);
        return Transaction::all(); // Temp display all transaction - No Auth
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
        $this->validate($request, [
            'title' => 'required',
            'currency' => 'required|max:144',
            'amount_deposited' => 'required|numeric|max:144',
            'amount_received' => 'required|numeric|max:144',
            'transaction_id' => 'required|numeric|max:144',
            'notes' => 'required|max:255', // Update function
            'user_id' => 'required|max:144'
        ]);
        $transaction = Transaction::create($request->all());
        $transaction->user_id = $request->user()->id;
        return response()->json($transaction, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
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
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Transaction $transaction)
    public function update(Request $request, $id)
    {
        //
        // $transaction = Transaction::find($id)->update([
        //     'title' => $request->get('title'),
        //     //'description' => $request->get('description'),
        // ]);
        // return response()->json($transaction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Transaction $transaction)
    public function destroy($id)
    {
        // //
        // $transaction = Transaction::findOrFail($id);
        // return response()->json($transaction->delete());
    }
}
