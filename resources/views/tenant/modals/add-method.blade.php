<div id="addMethodModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-md p-6 text-sm">

        <h3 class="text-lg font-bold mb-4 text-center">
            إضافة طريقة إيداع
        </h3>

        <form method="POST" action="{{ route('tenant.deposit-methods.store') }}">
            @csrf

            {{-- Method Name --}}
            <div class="mb-4">
                <label class="block mb-1 text-gray-600">اسم الطريقة</label>
                <input type="text" name="name" required class="w-full rounded-lg border px-3 py-2"
                    placeholder="مثال: بنكك / فوري / تحويل بنكي">
            </div>

            {{-- Account Name --}}
            <div class="mb-4">
                <label class="block mb-1 text-gray-600">اسم الحساب</label>
                <input type="text" name="account_name" class="w-full rounded-lg border px-3 py-2"
                    placeholder="مثال: Mohammed Yousif">
            </div>

            {{-- Account Number --}}
            <div class="mb-4">
                <label class="block mb-1 text-gray-600">رقم الحساب</label>
                <input type="text" name="account_number" class="w-full rounded-lg border px-3 py-2"
                    placeholder="مثال: 1222000">
            </div>


            {{-- Status --}}
            <div class="mb-4 flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" checked class="rounded border-gray-300">
                <label class="text-gray-700">
                    مفعّلة
                </label>
            </div>

            {{-- Actions --}}
            <div class="flex justify-between mt-6">
                <button type="button" onclick="closeAddMethodModal()" class="px-4 py-2 text-gray-600">
                    إلغاء
                </button>

                <button type="submit" class="px-4 py-2 rounded-lg
                   bg-gradient-to-b from-teal-500 to-teal-600
                   text-white font-semibold">
                    حفظ
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    function openAddMethodModal() {
        const modal = document.getElementById('addMethodModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeAddMethodModal() {
        const modal = document.getElementById('addMethodModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>