<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;


class DashboardController extends Controller
{



    public function index()
    {
        $year = request('year', date('Y'));

        /*
        |--------------------------------------------------------------------------
        | SALDO
        |--------------------------------------------------------------------------
        */

        $balance = Transaction::where('user_id', auth::id())
            ->whereYear('transaction_date', $year)
            ->sum(
                DB::raw("
                    CASE
                        WHEN type = 'pemasukan'
                        THEN amount
                        ELSE -amount
                    END
                ")
            );

        /*
        |--------------------------------------------------------------------------
        | PEMASUKAN HARI INI
        |--------------------------------------------------------------------------
        */

        $todayIncome = Transaction::where('user_id', auth::id())
            ->whereYear('transaction_date', $year)
            ->where('type', 'pemasukan')
            ->whereDate('transaction_date', today())
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | PENGELUARAN HARI INI
        |--------------------------------------------------------------------------
        */

        $todayExpense = Transaction::where('user_id', auth::id())
            ->whereYear('transaction_date', $year)
            ->where('type', 'pengeluaran')
            ->whereDate('transaction_date', today())
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | PEMASUKAN BULAN INI
        |--------------------------------------------------------------------------
        */

        $monthIncome = Transaction::where('user_id', auth::id())
            ->whereYear('transaction_date', $year)
            ->where('type', 'pemasukan')
            ->whereMonth('transaction_date', now()->month)
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | PENGELUARAN BULAN INI
        |--------------------------------------------------------------------------
        */

        $monthExpense = Transaction::where('user_id', auth::id())
            ->whereYear('transaction_date', $year)
            ->where('type', 'pengeluaran')
            ->whereMonth('transaction_date', now()->month)
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | LABA BULAN INI
        |--------------------------------------------------------------------------
        */

        $profit = $monthIncome - $monthExpense;

        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI TERBARU
        |--------------------------------------------------------------------------
        */

        $latestTransactions = Transaction::where('user_id', auth::id())
            ->whereYear('transaction_date', $year)
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | GRAFIK BULANAN
        |--------------------------------------------------------------------------
        */

        $monthlyIncome = [];
        $monthlyExpense = [];

        for ($i = 1; $i <= 12; $i++) {

            $income = Transaction::where('user_id', auth::id())
                ->where('type', 'pemasukan')
                ->whereMonth('transaction_date', $i)
                ->whereYear('transaction_date', $year)
                ->sum('amount');

            $expense = Transaction::where('user_id', auth::id())
                ->where('type', 'pengeluaran')
                ->whereMonth('transaction_date', $i)
                ->whereYear('transaction_date', $year)
                ->sum('amount');

            $monthlyIncome[] = $income;
            $monthlyExpense[] = $expense;
        }

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('dashboard', compact(
            'balance',
            'todayIncome',
            'todayExpense',
            'monthIncome',
            'monthExpense',
            'profit',
            'latestTransactions',
            'monthlyIncome',
            'monthlyExpense',
            'year'
        ));
    }
}