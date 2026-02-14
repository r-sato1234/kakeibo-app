<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $household = $user->household;

        $start = Carbon::now()->startOfMonth();
        $end   = Carbon::now()->endOfMonth();

        $income = Transaction::where('household_id', $household->id)
            ->whereBetween('date', [$start, $end])
            ->where('type', 'income')
            ->sum('amount');

        $expense = Transaction::where('household_id', $household->id)
            ->whereBetween('date', [$start, $end])
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $income - $expense;

        return view('dashboard', compact(
            'income',
            'expense',
            'balance'
        ));
    }
}
