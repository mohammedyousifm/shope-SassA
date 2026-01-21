<div id="addGameModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">

        <h2 class="text-xl font-bold mb-4 text-gray-800">
            ➕ إضافة لعبة جديدة
        </h2>

        <form method="POST" action="{{ route('tenant.products.store') }}" class="space-y-4">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    اسم اللعبة
                </label>
                <input type="text" name="name" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                                                                           focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>



            {{-- Actions --}}
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="document.getElementById('addGameModal').classList.add('hidden')"
                    class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100">
                    إلغاء
                </button>

                <button type="submit"
                    class="prevent-double-click px-4 py-2 rounded-lg bg-teal-600 text-white text-white font-semibold hover:bg-indigo-700">
                    حفظ
                </button>
            </div>
        </form>

    </div>
</div>