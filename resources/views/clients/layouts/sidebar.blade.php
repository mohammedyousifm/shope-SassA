<!-- زر إظهار السايدبار (ظاهر فقط على الشاشات الصغيرة) -->
<button id="toggleSidebarBtn" class="lg:hidden fixed top-4 right-4 w-10 h-10 flex items-center justify-center
           rounded-lg bg-white shadow hover:bg-gray-100
           transition">
    <i class="fa-solid fa-bars"></i>
</button>

<div id="sidebar"
    class="fixed right-0 top-0 h-full w-64 bg-gradient-to-b from-teal-500 to-teal-600 backdrop-blur-sm shadow-2xl transform translate-x-full lg:translate-x-0 transition-transform duration-300 z-40">

    <div class="p-6 bg-gradient-to-br from-teal-500 via-teal-600 to-cyan-600">
        <div class="flex items-center justify-center mb-2">
            <div class="px-6 py-3 rounded-2xl bg-white/10 backdrop-blur-md shadow-lg border border-white/20">
                <h1 class="text-2xl font-extrabold tracking-wide text-white">
                    hamzo
                </h1>
            </div>
        </div>
        <p class="text-center text-white/80 text-xs">منصة إدارة المتاجر الرقمية</p>
    </div>

    @php
        $active = 'bg-white bg-opacity-20';
    @endphp


    <nav class="space-y-2">
        <a href="{{ route('clients.index') }}" class="sidebar-item flex items-center justify-start gap-3 px-4 py-3 rounded-lg text-white
                {{ request()->routeIs('clients.index') ? $active : 'hover:bg-white hover:bg-opacity-10' }}">
            <svg class=" w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="font-semibold f-13">شحن الألعاب</span>
        </a>

        <a href="{{ route('clients.recharge') }}" class="sidebar-item flex items-center justify-start gap-3 px-4 py-3 rounded-lg text-white
                 {{ request()->routeIs('clients.recharge') ? $active : 'hover:bg-white hover:bg-opacity-10' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                </path>
            </svg>
            <span class="font-semibold f-13">تعبئة المحفظة</span>
        </a>


        <a href="{{ route('clients.profile') }}" class="sidebar-item flex items-center justify-start gap-3 px-4 py-3 rounded-lg text-white
                 {{ request()->routeIs('clients.profile') ? $active : 'hover:bg-white hover:bg-opacity-10' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span class="font-semibold f-13">ملفي الشخصي</span>
        </a>

        <a href="{{ route('logout') }}"
            class="sidebar-item flex items-center justify-start gap-3 px-4 py-3 rounded-lg text-white hover:bg-white hover:bg-opacity-10">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span class="font-semibold f-13">
                تسجيل الخروج</span>
        </a>
    </nav>

</div>
</div>

<script>
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("toggleSidebarBtn");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("translate-x-full");
    });

    // اختياري: إغلاق السايدبار عند النقر خارجها
    document.addEventListener("click", (e) => {
        if (
            !sidebar.contains(e.target) &&
            !toggleBtn.contains(e.target) &&
            window.innerWidth < 1024
        ) {
            sidebar.classList.add("translate-x-full");
        }
    });
</script>