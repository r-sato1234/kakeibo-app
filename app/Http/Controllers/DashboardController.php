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

        // 過去12ヶ月の推移データ
        $monthlyLabels = [];
        $monthlyIncome = [];
        $monthlyExpense = [];

        for ($i = 11; $i >= 0; $i--) {

            $date = now()->subMonths($i);

            $startMonth = $date->copy()->startOfMonth();
            $endMonth   = $date->copy()->endOfMonth();

            $label = $date->format('Y-m');

            $monthlyLabels[] = $label;

            $monthlyIncome[] = Transaction::where('household_id', $household->id)
                ->whereBetween('date', [$startMonth, $endMonth])
                ->where('type', 'income')
                ->sum('amount');

            $monthlyExpense[] = Transaction::where('household_id', $household->id)
                ->whereBetween('date', [$startMonth, $endMonth])
                ->where('type', 'expense')
                ->sum('amount');
        }

        $pieLabels = $categoryExpenses->pluck('category.name');
        $pieData   = $categoryExpenses->pluck('total');

        $yearStart = now()->startOfYear();
        $yearEnd   = now()->endOfYear();

        $yearIncome = Transaction::where('household_id', $household->id)
            ->whereBetween('date', [$yearStart, $yearEnd])
            ->where('type', 'income')
            ->sum('amount');

        $yearExpense = Transaction::where('household_id', $household->id)
            ->whereBetween('date', [$yearStart, $yearEnd])
            ->where('type', 'expense')
            ->sum('amount');

        $yearBalance = $yearIncome - $yearExpense;


        return view('dashboard', compact(
            'income',
            'expense',
            'balance',
            'categoryExpenses',
            'selectedMonth',
            'monthlyLabels',
            'monthlyIncome',
            'monthlyExpense',
            'pieLabels',
            'pieData',
            'yearIncome',
            'yearExpense',
            'yearBalance',
        ));
    }
}
