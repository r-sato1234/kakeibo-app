<x-app-layout>
    <div class="max-w-2xl mx-auto py-6">
        <h2 class="text-xl font-bold mb-4">カテゴリ編集</h2>

        <form method="POST"
              action="{{ route('categories.update', $category) }}">
            @method('PUT')
            @include('categories._form')
        </form>
    </div>
</x-app-layout>
