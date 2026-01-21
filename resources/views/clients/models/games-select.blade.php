{{-- Header Banner --}}
<x-page-header title="نوب شوب" description="أسرع منصة في السودان لشحن ببجي، فري فاير – دعم فوري 24/7" />

<div class="bg-white mt-6 rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

    {{-- Decorative Header --}}
    <div class="bg-gradient-to-l from-teal-500 to-teal-600 p-6 text-white">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-bold">شحن فوري</h2>
                <p class="text-white/80 text-sm">اختر اللعبة والباقة المناسبة</p>
            </div>
        </div>
    </div>

    {{-- Form --}}
    <form id="charge-form" method="post" action="{{ route('clients.order.package.store') }}" class="p-6 space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-4">

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

                <select id="game-select" name="game_id"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all appearance-none bg-white cursor-pointer hover:border-teal-300"
                    required>
                    <option value="">-- اختر اللعبة --</option>
                    @foreach ($games as $game)
                        <option value="{{ $game->id }}" data-packages='@json($game->packages)'>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Package Selection --}}
            <div class="space-y-2">
                <label class="block text-right text-gray-700 font-semibold text-sm">
                    <span class="flex items-center justify-start gap-2">
                        <span>اختر الباقة</span>
                        <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </span>
                </label>

                <select id="package-select" name="game_package_id"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all appearance-none bg-white disabled:bg-gray-50 disabled:text-gray-400 disabled:cursor-not-allowed"
                    disabled required>
                    <option value="">-- اختر الباقة --</option>
                </select>

                <p class="text-xs text-gray-500 text-right">اختر اللعبة أولاً لعرض الباقات المتاحة</p>
            </div>
        </div>

        {{-- Player ID --}}
        <div class="space-y-2">
            <label class="block text-right text-gray-700 font-semibold text-sm">
                <span class="flex items-center justify-start gap-2">
                    <span>معرف اللاعب (Player ID)</span>
                    <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                </span>
            </label>

            <div class="relative">
                <input type="text" name="player_id" placeholder="أدخل معرف اللاعب الخاص بك"
                    class="w-full px-2 py-3 pr-3 rounded-lg border-2 border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none text-right transition-all"
                    required>
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
            </div>

            <div class="flex items-start gap-2 bg-blue-50 border border-blue-200 rounded-lg p-3">
                <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd" />
                </svg>
                <p class="text-xs text-blue-700 text-right">تأكد من إدخال معرف اللاعب بشكل صحيح لضمان وصول الشحن</p>
            </div>
        </div>

        {{-- Submit Button --}}
        <div class="pt-4">
            <button type="submit"
                class="prevent-double-click w-full bg-gradient-to-l from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white font-bold py-4 rounded-xl flex items-center justify-center gap-3 shadow-lg shadow-teal-500/30 hover:shadow-xl hover:shadow-teal-500/40 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <span>شحن الآن</span>
            </button>
        </div>

        {{-- Security Badge --}}
        <div class="flex items-center justify-center gap-2 text-xs text-gray-500 pt-2">
            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <span>معاملات آمنة ومشفرة</span>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const gameSelect = document.getElementById('game-select');
        const packageSelect = document.getElementById('package-select');

        gameSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const packages = JSON.parse(selectedOption.dataset.packages || '[]');

            // Clear and disable package select
            packageSelect.innerHTML = '<option value="">-- اختر الباقة --</option>';
            packageSelect.disabled = packages.length === 0;

            // Populate packages
            packages.forEach(pkg => {
                const option = document.createElement('option');
                option.value = pkg.id;
                option.textContent = `${pkg.name} - ${pkg.price} ج.س`;
                packageSelect.appendChild(option);
            });

            // Add visual feedback
            if (packages.length > 0) {
                packageSelect.classList.remove('bg-gray-50');
                packageSelect.classList.add('bg-white');
            } else {
                packageSelect.classList.remove('bg-white');
                packageSelect.classList.add('bg-gray-50');
            }
        });
    });
</script>