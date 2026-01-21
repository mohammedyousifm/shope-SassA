<div
    class="rounded-2xl p-6 bg-gradient-to-br from-teal-500 via-teal-600 to-cyan-600 relative overflow-hidden shadow-xl">
    {{-- Decorative Elements --}}
    <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full -translate-x-32 -translate-y-32"></div>
    <div class="absolute bottom-0 right-0 w-48 h-48 bg-white/10 rounded-full translate-x-24 translate-y-24"></div>

    <div class="relative z-10 flex items-center justify-between">
        <div class="flex-1">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white">
                    {{ $title }}
                </h1>
            </div>
            <p class="text-white/90 text-sm leading-relaxed max-w-2xl">
                {{ $description }}
            </p>
        </div>

        <div class="hidden lg:block">
            <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-white text-sm font-semibold">نشط</span>
            </div>
        </div>
    </div>
</div>