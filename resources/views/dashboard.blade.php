<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ダッシュボード
            </h2>

            {{-- 月選択 --}}
            <form method="GET" action="{{ route('dashboard') }}">
                <input type="month"
                    name="month"
                    value="{{ $selectedMonth }}"
                    onchange="this.form.submit()"
                    class="border-gray-300 rounded-md shadow-sm">
            </form>

        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-sm text-gray-500 mb-2">収入</h3>
                    <p class="text-3xl font-bold text-green-600">
                        ¥{{ number_format($income) }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-sm text-gray-500 mb-2">支出</h3>
                    <p class="text-3xl font-bold text-red-600">
                        ¥{{ number_format($expense) }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-sm text-gray-500 mb-2">差額</h3>
                    <p class="text-3xl font-bold text-blue-600">
                        ¥{{ number_format($balance) }}
                    </p>
                </div>

                {{-- カテゴリ別支出 --}}
                <div class="mt-10">
                    <div class="bg-white p-6 rounded-lg shadow">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            今月のカテゴリ別支出
                        </h3>

                        @if($categoryExpenses->isEmpty())
                            <p class="text-gray-500">
                                今月の支出データがありません。
                            </p>
                        @else
                            <table class="min-w-full divide-y divide-gray-200">

                                <thead>
                                    <tr>
                                        <th class="text-left text-sm font-medium text-gray-500 py-2">
                                            カテゴリ
                                        </th>
                                        <th class="text-right text-sm font-medium text-gray-500 py-2">
                                            金額
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-100">
                                    @foreach($categoryExpenses as $item)
                                        <tr>
                                            <td class="py-3">
                                                {{ $item->category->name }}
                                            </td>
                                            <td class="py-3 text-right font-semibold">
                                                ¥{{ number_format($item->total) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
