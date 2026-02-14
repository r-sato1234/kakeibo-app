{{-- resources/views/categories/index.blade.php --}}
<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                カテゴリ一覧
            </h2>

            <a href="{{ route('categories.create') }}"
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
                                名前
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                作成日
                            </th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $category->name }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $category->created_at->format('Y-m-d') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end items-center gap-4">

                                        <a href="{{ route('categories.edit', $category) }}"
                                           class="text-yellow-600 hover:underline">
                                            編集
                                        </a>

                                        <form method="POST"
                                              action="{{ route('categories.destroy', $category) }}">
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
                                <td colspan="3"
                                    class="px-6 py-6 text-center text-gray-500">
                                    カテゴリがまだありません
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</x-app-layout>
