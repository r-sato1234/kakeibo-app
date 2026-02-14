<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                取引登録
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
                <div class="px-6 py-6">

                    <form method="POST" action="{{ route('transactions.store') }}">
                        @include('transactions._form')
                    </form>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>
