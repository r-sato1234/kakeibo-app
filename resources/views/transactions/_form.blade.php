@csrf

<div class="space-y-6">

    {{-- カテゴリ --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            カテゴリ
        </label>

        <select name="category_id"
                class="w-full border-gray-300 rounded-md shadow-sm
                       focus:ring-blue-500 focus:border-blue-500
                       @error('category_id') border-red-500 @enderror">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $transaction->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        @error('category_id')
            <p class="text-sm text-red-600 mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- 種別 --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            種別
        </label>

        <select name="type"
                class="w-full border-gray-300 rounded-md shadow-sm
                       focus:ring-blue-500 focus:border-blue-500
                       @error('type') border-red-500 @enderror">
            <option value="income"
                {{ old('type', $transaction->type ?? '') == 'income' ? 'selected' : '' }}>
                収入
            </option>
            <option value="expense"
                {{ old('type', $transaction->type ?? '') == 'expense' ? 'selected' : '' }}>
                支出
            </option>
        </select>

        @error('type')
            <p class="text-sm text-red-600 mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- 金額 --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            金額
        </label>

        <input type="number"
               name="amount"
               value="{{ old('amount', $transaction->amount ?? '') }}"
               class="w-full border-gray-300 rounded-md shadow-sm
                      focus:ring-blue-500 focus:border-blue-500
                      @error('amount') border-red-500 @enderror">

        @error('amount')
            <p class="text-sm text-red-600 mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- 日付 --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            日付
        </label>

        <input type="date"
               name="date"
               value="{{ old('date', $transaction->date ?? now()->toDateString()) }}"
               class="w-full border-gray-300 rounded-md shadow-sm
                      focus:ring-blue-500 focus:border-blue-500
                      @error('date') border-red-500 @enderror">

        @error('date')
            <p class="text-sm text-red-600 mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- メモ --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            メモ
        </label>

        <input type="text"
               name="note"
               value="{{ old('note', $transaction->note ?? '') }}"
               class="w-full border-gray-300 rounded-md shadow-sm
                      focus:ring-blue-500 focus:border-blue-500
                      @error('note') border-red-500 @enderror">

        @error('note')
            <p class="text-sm text-red-600 mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="pt-4">
        <button
            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm transition">
            保存
        </button>
    </div>

</div>
