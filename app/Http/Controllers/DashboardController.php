<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $household = $user->household;

        $selectedMonth = $request->input('month', now()->format('Y-m'));

        $date = Carbon::createFromFormat('Y-m', $selectedMonth);

        $start = $date->copy()->startOfMonth();
        $end   = $date->copy()->endOfMonth();

        $income = Transaction::where('household_id', $household->id)
            ->whereBetween('date', [$start, $end])
            ->where('type', 'income')
            ->sum('amount');

        $expense = Transaction::where('household_id', $household->id)
            ->whereBetween('date', [$start, $end])
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $income - $expense;

        $categoryExpenses = Transaction::where('household_id', $household->id)
            ->selectRaw('category_id, SUM(amount) as total')
            ->whereBetween('date', [$start, $end])
            ->where('type', 'expense')
            ->groupBy('category_id')
            ->with('category')
            ->get();

        return view('dashboard', compact(
            'income',
            'expense',
            'balance',
            'categoryExpenses',
            'selectedMonth'
        ));
    }
}
