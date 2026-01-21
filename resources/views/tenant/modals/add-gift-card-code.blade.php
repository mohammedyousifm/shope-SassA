<div id="addgiftCardCodeModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-md p-6">

        <h3 class="text-lg font-bold mb-4 text-center">
            أضافه كود جديدة
        </h3>

        <form method="POST" id="addPackageForm" action="">
            @csrf

            {{-- game_id --}}
            <input type="hidden" name="gift_card_id" id="gift_card_id">

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    كود
                </label>
                <input type="text" name="code" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2
                                                                           focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex justify-between mt-6">
                <button type="button" onclick="closeopenAddgiftCardCodeModal()" class="px-4 py-2 text-gray-600">
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
    function openAddgiftCardCodeModal(gameId) {
        document.getElementById('gift_card_id').value = gameId;

        const modal = document.getElementById('addgiftCardCodeModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeopenAddgiftCardCodeModal() {
        const modal = document.getElementById('addgiftCardCodeModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>