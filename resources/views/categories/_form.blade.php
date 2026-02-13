@csrf

<div class="mb-4">
    <label class="block mb-1 font-semibold">カテゴリ名</label>
    <input type="text"
           name="name"
           value="{{ old('name', $category->name ?? '') }}"
           class="w-full border p-2 rounded">
</div>

<button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
    保存
</button>
