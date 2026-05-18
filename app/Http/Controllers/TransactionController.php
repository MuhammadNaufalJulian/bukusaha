<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'category' => 'required',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable',
            'transaction_date' => 'required|date',
        ]);

        Transaction::create([
            'user_id' => 1,
            'type' => $request->type,
            'category' => $request->category,
            'amount' => (int) $request->amount,
            'description' => $request->description,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect('/dashboard')
            ->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function index(Request $request)
{
    $search = $request->get('search');
    $type = $request->get('type');
    $year = $request->get('year', date('Y'));
    $month = $request->get('month');

    $query = Transaction::query();

    // FILTER TAHUN

    if ($year) {

        $query->whereYear('transaction_date', $year);

    }

    // FILTER SEARCH

    if ($search) {

        $query->where(function ($q) use ($search) {

            $q->where('category', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");

        });

    }

    // FILTER JENIS

    if ($type) {

        $query->where('type', $type);

    }

    // FILTER BULAN

    if ($month) {

        $query->whereMonth('transaction_date', $month);

    }

    // DATA TRANSAKSI

    $transactions = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    // TOTAL PEMASUKAN

    $totalIncome = (clone $query)
        ->where('type', 'pemasukan')
        ->sum('amount');

    // TOTAL PENGELUARAN

    $totalExpense = (clone $query)
        ->where('type', 'pengeluaran')
        ->sum('amount');

    return view('transactions.index', compact(
        'transactions',
        'totalIncome',
        'totalExpense',
        'search',
        'type',
        'year',
        'month'
    ));
}

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'type' => 'required',
            'category' => 'required',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update([
            'type' => $request->type,
            'category' => $request->category,
            'amount' => (int) $request->amount,
            'description' => $request->description,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect('/transactions')
            ->with('success', 'Transaksi berhasil diupdate');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect('/dashboard')
            ->with('success', 'Transaksi berhasil dihapus');
    }


    
}