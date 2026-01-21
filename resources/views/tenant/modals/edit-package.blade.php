<div id="editpackagesModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-md p-6">

        <h3 class="text-lg font-bold mb-4 text-center">
            تعديل باقة
        </h3>

        <form method="POST" id="editPackageForm">
            @csrf
            @method('PUT')

            {{-- package_id --}}
            <input type="hidden" id="edit_package_id">

            {{-- game_id --}}
            <input type="hidden" name="game_id" id="edit_game_id">

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    اسم الباقة
                </label>
                <input type="text" name="name" id="edit_name" required class="w-full rounded-lg border border-gray-300 px-3 py-2
                           focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            {{-- Price --}}
            <div class="mb-4">
                <label class="block text-sm mb-1 text-right">السعر</label>
                <input type="number" step="0.01" name="price" id="edit_price" required
                    class="w-full border rounded px-3 py-2 text-right">
            </div>

            <div class="flex justify-between mt-6">
                <button type="button" onclick="closeEditpackagesModal()" class="px-4 py-2 text-gray-600">
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
    function openEditPackagesModal(pkg) {
        // تعبئة البيانات
        document.getElementById('edit_package_id').value = pkg.id;
        document.getElementById('edit_game_id').value = pkg.game_id;
        document.getElementById('edit_name').value = pkg.name;
        document.getElementById('edit_price').value = pkg.price;

        // تحديد action للفورم (update)
        const form = document.getElementById('editPackageForm');
        form.action = `/dashboard/packages/${pkg.id}`;

        // إظهار المودال
        const modal = document.getElementById('editpackagesModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditpackagesModal() {
        const modal = document.getElementById('editpackagesModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>