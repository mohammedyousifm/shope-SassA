<div id="editgiftcardsModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-md p-6">

        <h3 class="text-lg font-bold mb-4 text-center">
            تعديل باقة
        </h3>

        <form method="POST" id="editGiftCardForm">
            @csrf
            @method('PUT')

            <input type="hidden" id="edit_giftcard_id">
            <input type="hidden" name="game_id" id="edit_game_gifit_id">


            {{-- Value --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    اسم الباقة
                </label>
                <input type="text" name="value" id="edit_value" required class="w-full rounded-lg border border-gray-300 px-3 py-2
                              focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            {{-- Price --}}
            <div class="mb-4">
                <label class="block text-sm mb-1 text-right">السعر</label>
                <input type="number" step="0.01" name="price" id="edit_price" required
                    class="w-full border rounded px-3 py-2 text-right">
            </div>

            <div class="flex justify-between mt-6">
                <button type="button" onclick="closeEditGiftCardModal()" class="px-4 py-2 text-gray-600">
                    إلغاء
                </button>

                <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded">
                    حفظ
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditGiftCardModal(btn) {

        const id = btn.dataset.id;
        const gameId = btn.dataset.gameId;
        const value = btn.dataset.value;
        const price = btn.dataset.price;

        const modal = document.getElementById('editgiftcardsModal');

        // 🔑 البحث داخل المودال فقط
        modal.querySelector('#edit_giftcard_id').value = id;
        modal.querySelector('#edit_game_gifit_id').value = gameId;
        modal.querySelector('#edit_value').value = value;
        modal.querySelector('#edit_price').value = parseFloat(price);

        const form = modal.querySelector('#editGiftCardForm');
        form.action = `/dashboard/gift-cards/${id}`;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditGiftCardModal() {
        const modal = document.getElementById('editgiftcardsModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>