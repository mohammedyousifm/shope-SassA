{{-- Add Code Modal --}}
<div id="addcodeModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl w-full max-w-lg shadow-2xl transform transition-all">

        {{-- Modal Header --}}
        <div
            class="bg-gradient-to-l from-teal-500 to-teal-600 rounded-t-2xl px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-white">إضافة أكواد جديدة</h3>
            <button type="button" onclick="closeAddcodeModal()"
                class="text-white/80 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('tenant.code.products.store') }}" class="p-6">
            @csrf

            {{-- Game Select --}}
            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">اللعبة</label>
                <select name="game_id"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all"
                    required>
                    <option value="">اختر لعبة</option>
                    @foreach ($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Value Input --}}
            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">القيمة</label>
                <input type="number" name="value"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all"
                    placeholder="مثال: 100" required>
            </div>

            {{-- Price Input --}}
            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-2">السعر</label>
                <input type="number" name="price"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all"
                    placeholder="مثال: 50" required>
            </div>

            {{-- Codes Input --}}
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">الأكواد</label>
                <div id="codesWrapper" class="space-y-3">
                    <input type="text" name="codes[]"
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all"
                        placeholder="أدخل الكود" required>
                </div>
                <button type="button" onclick="addCodeInput()"
                    class="mt-3 text-sm text-teal-600 hover:text-teal-700 font-medium flex items-center gap-1 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    إضافة كود آخر
                </button>
            </div>

            {{-- Action Buttons --}}
            <div class="flex gap-3 pt-4 border-t">
                <button type="button" onclick="closeAddcodeModal()"
                    class="flex-1 px-5 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 font-medium transition-all duration-200">
                    إلغاء
                </button>
                <button type="submit"
                    class="flex-1 px-5 py-3 bg-gradient-to-l from-teal-600 to-teal-500 text-white rounded-lg hover:from-teal-700 hover:to-teal-600 font-medium transition-all duration-200 shadow-lg shadow-teal-500/30">
                    حفظ الأكواد
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleCode(btn) {
        const textEl = btn.querySelector('.code-text');
        const full = btn.dataset.full;
        const short = btn.dataset.short;
        textEl.textContent = textEl.textContent === short ? full : short;
    }

    function addCodeInput() {
        const wrapper = document.getElementById('codesWrapper');
        const div = document.createElement('div');
        div.classList.add('flex', 'gap-2');
        div.innerHTML = `
                <input type="text" name="codes[]"
                    class="flex-1 px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all"
                    placeholder="أدخل الكود" required>
                <button type="button" onclick="this.parentElement.remove()"
                    class="px-4 py-3 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
        wrapper.appendChild(div);
    }

    function openAddcodeModal() {
        const modal = document.getElementById('addcodeModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeAddcodeModal() {
        const modal = document.getElementById('addcodeModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Close modal on backdrop click
    document.getElementById('addcodeModal')?.addEventListener('click', function (e) {
        if (e.target === this) closeAddcodeModal();
    });
</script>