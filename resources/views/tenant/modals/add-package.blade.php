<div id="addpackageModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-md p-6">

        <h3 class="text-lg font-bold mb-4 text-center">
            إضافة باقة جديدة
        </h3>

        <form method="POST" id="addPackageForm" action="{{ route('tenant.products.packages.store') }}">
            @csrf

            {{-- game_id --}}
            <input type="hidden" name="game_id" id="game_id">

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    اسم الباقة
                </label>
                <input type="text" name="name" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                                                                           focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>


            <div class="mb-4">
                <label class="block text-sm mb-1 text-right">السعر</label>
                <input type="number" step="0.01" name="price" class="w-full border rounded px-3 py-2 text-right"
                    required>
            </div>

            <div class="flex justify-between mt-6">
                <button type="button" onclick="closeAddPackageModal()" class="px-4 py-2 text-gray-600">
                    إلغاء
                </button>

                <button type="submit" class="prevent-double-click px-4 py-2 bg-teal-600 text-white rounded">
                    حفظ
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddPackageModal(gameId) {
        document.getElementById('game_id').value = gameId;

        const modal = document.getElementById('addpackageModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeAddPackageModal() {
        const modal = document.getElementById('addpackageModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>