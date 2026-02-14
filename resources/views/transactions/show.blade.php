<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                取引詳細
            </h2>

            <a href="{{ route('transactions.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md shadow-sm transition">
                一覧へ戻る
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="w-full divide-y divide-gray-200">

                    <tbody class="bg-white divide-y divide-gray-200">

                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 w-1/3">
                                日付
                            </th>
                            <td class="px-6 py-4">
                                {{ $transaction->date }}
                            </td>
                        </tr>

                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                                カテゴリ
                            </th>
                            <td class="px-6 py-4">
                                {{ $transaction->category->name }}
                            </td>
                        </tr>

                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                                種別
                            </th>
                            <td class="px-6 py-4">
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
                        </tr>

                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                                金額
                            </th>
                            <td class="px-6 py-4">
                                ¥{{ number_format($transaction->amount) }}
                            </td>
                        </tr>

                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                                メモ
                            </th>
                            <td class="px-6 py-4">
                                {{ $transaction->note ?? 'なし' }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>
