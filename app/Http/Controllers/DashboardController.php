<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $year = request('year', date('Y'));

        $balance = Transaction::whereYear('transaction_date', $year)
            ->sum(
                DB::raw("
                    CASE
                        WHEN type='pemasukan'
                        THEN amount
                        ELSE -amount
                    END
                ")
            );

        $todayIncome = Transaction::whereYear('transaction_date', $year)
            ->where('type', 'pemasukan')
            ->whereDate('transaction_date', today())
            ->sum('amount');

        $todayExpense = Transaction::whereYear('transaction_date', $year)
            ->where('type', 'pengeluaran')
            ->whereDate('transaction_date', today())
            ->sum('amount');

        $monthIncome = Transaction::whereYear('transaction_date', $year)
            ->where('type', 'pemasukan')
            ->whereMonth('transaction_date', now()->month)
            ->sum('amount');

        $monthExpense = Transaction::whereYear('transaction_date', $year)
            ->where('type', 'pengeluaran')
            ->whereMonth('transaction_date', now()->month)
            ->sum('amount');

        $profit = $monthIncome - $monthExpense;

        $latestTransactions = Transaction::whereYear('transaction_date', $year)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'balance',
            'todayIncome',
            'todayExpense',
            'monthIncome',
            'monthExpense',
            'profit',
            'latestTransactions',
            'year'
        ));
    }
}