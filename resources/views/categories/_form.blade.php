@csrf

<div class="space-y-6">

    {{-- カテゴリ名 --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            カテゴリ名
        </label>

        <input type="text"
               name="name"
               value="{{ old('name', $category->name ?? '') }}"
               class="w-full border-gray-300 rounded-md shadow-sm
                      focus:ring-blue-500 focus:border-blue-500
                      @error('name') border-red-500 @enderror">

        @error('name')
            <p class="text-sm text-red-600 mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="pt-4">
        <button
            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm transition">
            保存
        </button>
    </div>

</div>
