<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                取引一覧
            </h2>
            <a href="{{ route('transactions.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm transition">
                新規登録
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                日付
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                カテゴリ
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                種別
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                金額
                            </th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($transactions as $transaction)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $transaction->date }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $transaction->category->name }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($transaction->type === 'income')
                                        <span class="text-green-600 font-medium">
                                            収入
                                        </span>
                                    @else
                                        <span class="text-red-600 font-medium">
                                            支出
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    ¥{{ number_format($transaction->amount) }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end items-center gap-4">

                                        <a href="{{ route('transactions.show', $transaction) }}"
                                        class="text-blue-600 hover:underline">
                                            詳細
                                        </a>

                                        <a href="{{ route('transactions.edit', $transaction) }}"
                                        class="text-yellow-600 hover:underline">
                                            編集
                                        </a>

                                        <form method="POST"
                                            action="{{ route('transactions.destroy', $transaction) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:underline"
                                                    onclick="return confirm('削除しますか？')">
                                                削除
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"
                                    class="px-6 py-6 text-center text-gray-500">
                                    取引がまだありません
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</x-app-layout>
