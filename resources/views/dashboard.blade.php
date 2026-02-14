<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ダッシュボード
            </h2>
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

            </div>

        </div>
    </div>

</x-app-layout>
