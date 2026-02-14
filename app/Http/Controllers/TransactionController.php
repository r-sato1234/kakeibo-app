<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Transaction::class);

        $transactions = auth()->user()
            ->household
            ->transactions()
            ->with('category', 'user')
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Transaction::class);

        $categories = auth()->user()
            ->household
            ->categories;

        return view('transactions.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        Gate::authorize('create', Transaction::class);

        auth()->user()->household->transactions()->create([
            'user_id' => auth()->id(),
            'household_id' => auth()->user()->household_id,
            ...$request->validated(),
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', '登録しました');
    }


    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        Gate::authorize('view', $transaction);

        return view('transactions.show', compact('transaction'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        Gate::authorize('update', $transaction);

        $categories = auth()->user()
            ->household
            ->categories;

        return view('transactions.edit', compact('transaction', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        Gate::authorize('update', $transaction);

        $transaction->update($request->validated());

        return redirect()
            ->route('transactions.index')
            ->with('success', '更新しました');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        Gate::authorize('delete', $transaction);

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', '削除しました');
    }
}
