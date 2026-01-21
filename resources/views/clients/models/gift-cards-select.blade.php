{{-- Header Banner --}}
<x-page-header title="متجر البطاقات" description="اشتر بطاقات الألعاب والمنصات بأفضل الأسعار واستلم الكود فورًا." />

{{-- Main Card --}}
<div class="bg-white mt-6 rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

    {{-- Decorative Header --}}
    <div class="bg-gradient-to-l from-teal-500 to-teal-600 p-6 text-white">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-bold">شراء بطاقات فورية</h2>
                <p class="text-white/80 text-sm">اختر اللعبة والبطاقة واستلم الكود مباشرة</p>
            </div>
        </div>
    </div>

    {{-- Form --}}
    <form action="" method="post" class="p-6 space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Game Selection --}}
            <div class="space-y-2">
                <label class="block text-right text-gray-700 font-semibold text-sm">
                    <span class="flex items-center justify-start gap-2">
                        <span>اختر اللعبة</span>
                        <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                    </span>
                </label>

                <select id="game-card-select" name="game_id"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all appearance-none bg-white cursor-pointer hover:border-teal-300"
                    required>
                    <option value="">-- اختر اللعبة --</option>
                    @foreach ($giftCardGames as $game)
                        <option value="{{ $game->id }}" data-packages='@json($game->giftCard)'>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Gift Card Selection --}}
            <div class="space-y-2">
                <label class="block text-right text-gray-700 font-semibold text-sm">
                    <span class="flex items-center justify-start gap-2">
                        <span>اختر البطاقة</span>
                        <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </span>
                </label>

                <select id="package-card-select" name="gift_card_id"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all appearance-none bg-white disabled:bg-gray-50 disabled:text-gray-400 disabled:cursor-not-allowed"
                    disabled required>
                    <option value="">-- اختر البطاقة --</option>
                </select>

                <p class="text-xs text-gray-500 text-right">اختر اللعبة أولاً لعرض البطاقات المتاحة</p>

                {{-- No Packages Alert --}}
                <div id="no-packages-card-alert" class="hidden mt-2">
                    <div class="flex items-start gap-2 bg-red-50 border border-red-200 rounded-lg p-3">
                        <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm text-red-700 text-right font-medium">لا توجد بطاقات متاحة لهذه اللعبة حاليًا
                        </p>
                    </div>
                </div>
            </div>

        </div>

        {{-- Info Box --}}
        <div
            class="flex items-start gap-3 bg-gradient-to-l from-blue-50 to-cyan-50 border border-blue-200 rounded-xl p-4">
            <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd" />
            </svg>
            <div class="flex-1 text-right">
                <h4 class="font-semibold text-blue-900 mb-1">معلومات هامة</h4>
                <ul class="text-sm text-blue-800 space-y-1">
                    <li class="flex items-start gap-2 justify-start">
                        <span>سيتم إرسال الكود فورًا بعد إتمام عملية الشراء</span>
                        <svg class="w-4 h-4 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>
                    <li class="flex items-start gap-2 justify-start">
                        <span>تأكد من اختيار البطاقة المناسبة قبل الشراء</span>
                        <svg class="w-4 h-4 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Submit Button --}}
        <div class="pt-4">
            <button type="submit"
                class="prevent-double-click w-full bg-gradient-to-l from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white font-bold py-4 rounded-xl flex items-center justify-center gap-3 shadow-lg shadow-teal-500/30 hover:shadow-xl hover:shadow-teal-500/40 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>شراء الآن</span>
            </button>
        </div>

        {{-- Security Badge --}}
        <div class="flex items-center justify-center gap-2 text-xs text-gray-500 pt-2">
            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <span>معاملات آمنة ومشفرة • تسليم فوري</span>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const gameSelect = document.getElementById('game-card-select');
        const packageSelect = document.getElementById('package-card-select');
        const noPackagesAlert = document.getElementById('no-packages-card-alert');

        gameSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const packages = JSON.parse(selectedOption.dataset.packages || '[]');

            // Clear package select
            packageSelect.innerHTML = '<option value="">-- اختر البطاقة --</option>';

            // Hide alert initially
            noPackagesAlert.classList.add('hidden');

            if (packages.length === 0) {
                // Show alert if no packages
                packageSelect.disabled = true;
                packageSelect.classList.remove('bg-white');
                packageSelect.classList.add('bg-gray-50');
                noPackagesAlert.classList.remove('hidden');
            } else {
                // Populate packages
                packageSelect.disabled = false;
                packageSelect.classList.remove('bg-gray-50');
                packageSelect.classList.add('bg-white');

                packages.forEach(pkg => {
                    const option = document.createElement('option');
                    option.value = pkg.id;
                    option.textContent = `${pkg.value}$ - ${pkg.price} ج.س`;
                    packageSelect.appendChild(option);
                });
            }
        });
    });
</script>