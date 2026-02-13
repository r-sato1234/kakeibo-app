@csrf

<div class="mb-4">
    <label>カテゴリ</label>
    <select name="category_id" class="w-full border p-2 rounded">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $transaction->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label>種別</label>
    <select name="type" class="w-full border p-2 rounded">
        <option value="income"
            {{ old('type', $transaction->type ?? '') == 'income' ? 'selected' : '' }}>
            収入
        </option>
        <option value="expense"
            {{ old('type', $transaction->type ?? '') == 'expense' ? 'selected' : '' }}>
            支出
        </option>
    </select>
</div>

<div class="mb-4">
    <label>金額</label>
    <input type="number"
           name="amount"
           value="{{ old('amount', $transaction->amount ?? '') }}"
           class="w-full border p-2 rounded">
</div>

<div class="mb-4">
    <label>日付</label>
    <input type="date"
           name="date"
           value="{{ old('date', $transaction->date ?? now()->toDateString()) }}"
           class="w-full border p-2 rounded">
</div>

<div class="mb-4">
    <label>メモ</label>
    <input type="text"
           name="note"
           value="{{ old('note', $transaction->note ?? '') }}"
           class="w-full border p-2 rounded">
</div>

<button class="bg-blue-500 text-white px-4 py-2 rounded">
    保存
</button>
