<x-app-layout>
    <div class="max-w-2xl mx-auto py-6">
        <h2 class="text-xl font-bold mb-4">取引編集</h2>

        <form method="POST"
              action="{{ route('transactions.update', $transaction) }}">
            @method('PUT')
            @include('transactions._form')
        </form>
    </div>
</x-app-layout>
