<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();

        return view('admin.transaction.index', compact('transactions'));
    }

    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'amount' => ['required', 'numeric'],
            'status' => ['required', 'string'],
            'note' => ['nullable', 'string'],
        ]);

        $transaction->update($validatedData);

        flash(__('Payment Request updated successfully.'), 'success');

        return redirect()->route('admin.transactions.index');
    }
}
