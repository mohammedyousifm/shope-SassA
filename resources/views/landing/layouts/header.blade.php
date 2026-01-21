<nav class="fixed top-0 w-full bg-white/80 backdrop-blur-lg border-b border-slate-200/60 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 sm:h-20">

            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl gradient-primary flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <span class="text-xl sm:text-2xl font-bold text-slate-800 tracking-tight">
                    نوب شوب
                </span>
            </div>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('merchant.plans') }}"
                    class="relative text-slate-600 hover:text-teal-600 font-medium transition after:absolute after:bottom-0 after:right-0 after:h-0.5 after:w-0 after:bg-teal-600 hover:after:w-full after:transition-all">
                    الأسعار
                </a>

                <a href="{{ route('merchant.login') }}"
                    class="text-slate-600 hover:text-teal-600 font-medium transition">
                    تسجيل الدخول
                </a>

                <a href="{{ route('merchant.register') }}"
                    class="px-5 py-2.5 gradient-primary text-white rounded-lg font-semibold hover:shadow-lg hover:scale-[1.02] transition">
                    ابدأ الآن
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition"
                aria-label="فتح القائمة">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-slate-200 shadow-lg">
        <div class="px-4 py-4 flex flex-col gap-4">
            <a href="{{ route('merchant.plans') }}" class="text-slate-700 font-medium hover:text-teal-600">الأسعار</a>
            <a href="{{ route('merchant.login') }}" class="text-slate-700 font-medium hover:text-teal-600">
                تسجيل الدخول
            </a>
            <a href="{{ route('merchant.register') }}"
                class="gradient-primary text-white text-center py-2.5 rounded-lg font-semibold">
                ابدأ الآن
            </a>
        </div>
    </div>
</nav>

<script>
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>