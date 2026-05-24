<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN TAMBAH TRANSAKSI
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('transactions.create');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN TRANSAKSI
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'type'             => 'required',
            'category'         => 'required',
            'amount'           => 'required|numeric|min:0',
            'description'      => 'nullable',
            'transaction_date' => 'required|date',
        ]);

        Transaction::create([
            'user_id'          => Auth::id(),
            'type'             => $request->type,
            'category'         => $request->category,
            'amount'           => (int) $request->amount,
            'description'      => $request->description,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect('/transactions')
            ->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN SEMUA TRANSAKSI
    |--------------------------------------------------------------------------
    */
public function index(Request $request)
{
    $chartFilter = $request->filter ?? 'tahun';
    $search = $request->search;
    $type = $request->type;

    $year = $request->year ?? date('Y');

    $month = $request->month;

    /*
    |--------------------------------------------------------------------------
    | QUERY UTAMA
    |--------------------------------------------------------------------------
    */

    $query = Transaction::where('user_id', auth()->id());

    // FILTER TAHUN

    if ($year) {

        $query->whereYear('transaction_date', $year);

    }

    // FILTER BULAN

    if ($month) {

        $query->whereMonth('transaction_date', $month);

    }

    // FILTER TYPE

    if ($type) {

        $query->where('type', $type);

    }

    // FILTER SEARCH

    if ($search) {

        $query->where(function ($q) use ($search) {

            $q->where('category', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");

        });

    }

    /*
    |--------------------------------------------------------------------------
    | DATA TRANSAKSI
    |--------------------------------------------------------------------------
    */

    $transactions = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    /*
    |--------------------------------------------------------------------------
    | TOTAL
    |--------------------------------------------------------------------------
    */

    $totalIncome = (clone $query)
        ->where('type', 'pemasukan')
        ->sum('amount');

    $totalExpense = (clone $query)
        ->where('type', 'pengeluaran')
        ->sum('amount');

    /*
    |--------------------------------------------------------------------------
    | GRAFIK
    |--------------------------------------------------------------------------
    */

    $chartLabels = [];

    $chartIncome = [];

    $chartExpense = [];

    /*
    |--------------------------------------------------------------------------
    | JIKA FILTER BULAN DIPILIH
    |--------------------------------------------------------------------------
    */

    if ($month) {

        $daysInMonth = cal_days_in_month(
            CAL_GREGORIAN,
            $month,
            $year
        );

        for ($day = 1; $day <= $daysInMonth; $day++) {

            $chartLabels[] = $day;

            $income = Transaction::where('user_id', auth()->id())
                ->whereYear('transaction_date', $year)
                ->whereMonth('transaction_date', $month)
                ->whereDay('transaction_date', $day)
                ->where('type', 'pemasukan')
                ->sum('amount');

            $expense = Transaction::where('user_id', auth()->id())
                ->whereYear('transaction_date', $year)
                ->whereMonth('transaction_date', $month)
                ->whereDay('transaction_date', $day)
                ->where('type', 'pengeluaran')
                ->sum('amount');

            $chartIncome[] = $income;

            $chartExpense[] = $expense;
        }

    }

    /*
    |--------------------------------------------------------------------------
    | JIKA SEMUA BULAN
    |--------------------------------------------------------------------------
    */

    else {

        $months = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Ags',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ];

        for ($i = 1; $i <= 12; $i++) {

            $chartLabels[] = $months[$i - 1];

            $income = Transaction::where('user_id', auth()->id())
                ->whereYear('transaction_date', $year)
                ->whereMonth('transaction_date', $i)
                ->where('type', 'pemasukan')
                ->sum('amount');

            $expense = Transaction::where('user_id', auth()->id())
                ->whereMonth('transaction_date', $i)
                ->whereYear('transaction_date', $year)
                ->where('type', 'pengeluaran')
                ->sum('amount');

            $chartIncome[] = $income;

            $chartExpense[] = $expense;
        }

    }

    /*
    |--------------------------------------------------------------------------
    | RETURN
    |--------------------------------------------------------------------------
    */
    $chartFilter = $request->get('filter', 'tahun');

    return view('transactions.index', compact(
         'transactions',
    'totalIncome',
    'totalExpense',
    'search',
    'type',
    'year',
    'month',
    'chartLabels',
    'chartIncome',
    'chartExpense',
    'chartFilter'
    ));
}

    /*
    |--------------------------------------------------------------------------
    | HALAMAN EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE TRANSAKSI
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'type'             => 'required',
            'category'         => 'required',
            'amount'           => 'required|numeric|min:0',
            'description'      => 'nullable',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update([
            'type'             => $request->type,
            'category'         => $request->category,
            'amount'           => (int) $request->amount,
            'description'      => $request->description,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect('/transactions')
            ->with('success', 'Transaksi berhasil diupdate!');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS TRANSAKSI
    |--------------------------------------------------------------------------
    */

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect('/transactions')
            ->with('success', 'Transaksi berhasil dihapus!');
    }
}
