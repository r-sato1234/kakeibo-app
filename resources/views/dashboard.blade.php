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

                {{-- 月別推移グラフ --}}
                <div class="mt-10">
                    <div class="bg-white p-6 rounded-lg shadow">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            月別推移（過去12ヶ月）
                        </h3>

                        <canvas id="monthlyChart"></canvas>

                    </div>
                </div>

                <div class="mt-10">
                    <div class="bg-white p-6 rounded-lg shadow">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            年間サマリ（{{ now()->year }}年）
                        </h3>

                        <div class="space-y-4">

                            <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center">
                                <p class="text-sm text-gray-500">年間収入</p>
                                <p class="text-2xl font-bold text-green-600">
                                    ¥{{ number_format($yearIncome) }}
                                </p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center">
                                <p class="text-sm text-gray-500">年間支出</p>
                                <p class="text-2xl font-bold text-red-600">
                                    ¥{{ number_format($yearExpense) }}
                                </p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center">
                                <p class="text-sm text-gray-500">年間差額</p>
                                <p class="text-2xl font-bold text-blue-600">
                                    ¥{{ number_format($yearBalance) }}
                                </p>
                            </div>

                        </div>

                    </div>
                </div>


                {{-- カテゴリ別支出グラフ --}}
                <div class="mt-10">
                    <div class="bg-white p-6 rounded-lg shadow">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            カテゴリ別支出（円グラフ）
                        </h3>

                        <canvas id="categoryPieChart"></canvas>

                    </div>
                </div>


            </div>

        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('monthlyChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($monthlyLabels),
            datasets: [
                {
                    label: '収入',
                    data: @json($monthlyIncome),
                    borderColor: 'rgb(34,197,94)',
                    backgroundColor: 'rgba(34,197,94,0.2)',
                    tension: 0.3
                },
                {
                    label: '支出',
                    data: @json($monthlyExpense),
                    borderColor: 'rgb(239,68,68)',
                    backgroundColor: 'rgba(239,68,68,0.2)',
                    tension: 0.3
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const pieCtx = document.getElementById('categoryPieChart');

    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: @json($pieLabels),
            datasets: [{
                data: @json($pieData),
                backgroundColor: [
                    '#60A5FA',
                    '#34D399',
                    '#FBBF24',
                    '#F87171',
                    '#A78BFA',
                    '#F472B6',
                    '#FB923C'
                ]
            }]
        },
        options: {
            responsive: true,
        }
    });

});
</script>
</x-app-layout>
