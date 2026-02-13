<x-app-layout>
    <div class="max-w-2xl mx-auto py-6">
        <h2 class="text-xl font-bold mb-4">カテゴリ登録</h2>

        <form method="POST" action="{{ route('categories.store') }}">
            @include('categories._form')
        </form>
    </div>
</x-app-layout>
