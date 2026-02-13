<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">取引一覧</h2>
            <a href="{{ route('transactions.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                新規登録
            </a>
        </div>

        <table class="w-full bg-white shadow rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2">日付</th>
                    <th>カテゴリ</th>
                    <th>種別</th>
                    <th>金額</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr class="border-t">
                    <td class="p-2">{{ $transaction->date }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>
                        @if($transaction->type === 'income')
                            <span class="text-green-600">収入</span>
                        @else
                            <span class="text-red-600">支出</span>
                        @endif
                    </td>
                    <td>¥{{ number_format($transaction->amount) }}</td>
                    <td class="flex gap-2">
                        <a href="{{ route('transactions.show', $transaction) }}"
                           class="text-blue-500">詳細</a>
                        <a href="{{ route('transactions.edit', $transaction) }}"
                           class="text-yellow-500">編集</a>
                        <form method="POST"
                              action="{{ route('transactions.destroy', $transaction) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"
                                    onclick="return confirm('削除しますか？')">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
