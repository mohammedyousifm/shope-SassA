<div id="addBalanceModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-md p-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">
                إضافة رصيد
            </h3>
            <button onclick="closeBalanceModal()" class="text-gray-400 hover:text-gray-600">
                ✕
            </button>
        </div>

        <p class="text-sm text-gray-600 mb-4 text-right">
            إضافة رصيد للمستخدم:
            <span id="userName" class="font-semibold text-gray-800"></span>
        </p>

        {{-- Form --}}
        <form method="POST" action="{{ route('dashboard.clients.add-balance') }}">
            @csrf

            {{-- user_id --}}
            <input type="hidden" name="user_id" id="balance_user_id">

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-2 text-right">
                    المبلغ
                </label>
                <input type="number" step="0.01" name="amount"
                    class="w-full px-4 py-2 border rounded-lg text-right focus:border-green-500 focus:outline-none"
                    placeholder="أدخل المبلغ">
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="closeBalanceModal()" class="px-4 py-2 text-gray-600">
                    إلغاء
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-gradient-to-b from-teal-500 to-teal-600 text-white rounded-lg hover:bg-green-700">
                    حفظ
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openBalanceModal(userId, userName) {
        document.getElementById('balance_user_id').value = userId;
        document.getElementById('userName').textContent = userName;

        const modal = document.getElementById('addBalanceModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeBalanceModal() {
        const modal = document.getElementById('addBalanceModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>