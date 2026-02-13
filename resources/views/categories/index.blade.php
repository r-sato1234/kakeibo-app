<x-app-layout>
    <div class="max-w-3xl mx-auto py-6">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">カテゴリ一覧</h2>
            <a href="{{ route('categories.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                新規登録
            </a>
        </div>

        <table class="w-full bg-white shadow rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">カテゴリ名</th>
                    <th class="text-right p-2">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="border-t">
                        <td class="p-2">{{ $category->name }}</td>
                        <td class="p-2 text-right space-x-2">
                            <a href="{{ route('categories.edit', $category) }}"
                               class="text-yellow-600 hover:underline">
                                編集
                            </a>
                            <form method="POST"
                                  action="{{ route('categories.destroy', $category) }}"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline"
                                        onclick="return confirm('削除しますか？')">
                                    削除
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-4 text-center text-gray-500">
                            カテゴリがまだありません
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>
