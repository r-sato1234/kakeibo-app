<x-app-layout>
    <div class="max-w-2xl mx-auto py-6">
        <h2 class="text-xl font-bold mb-4">取引詳細</h2>

        <div class="bg-white p-4 shadow rounded space-y-2">
            <p><strong>日付:</strong> {{ $transaction->date }}</p>
            <p><strong>カテゴリ:</strong> {{ $transaction->category->name }}</p>
            <p><strong>種別:</strong>
                {{ $transaction->type === 'income' ? '収入' : '支出' }}
            </p>
            <p><strong>金額:</strong> ¥{{ number_format($transaction->amount) }}</p>
            <p><strong>メモ:</strong> {{ $transaction->note }}</p>
        </div>

        <div class="mt-4">
            <a href="{{ route('transactions.index') }}"
               class="text-blue-500">一覧へ戻る</a>
        </div>
    </div>
</x-app-layout>
