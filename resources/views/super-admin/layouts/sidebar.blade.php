<!-- زر إظهار السايدبار (ظاهر فقط على الشاشات الصغيرة) -->
<button id="toggleSidebarBtn" class="lg:hidden fixed top-4 right-4 w-10 h-10 flex items-center justify-center
           rounded-lg bg-white shadow hover:bg-gray-100
           transition">
    <i class="fa-solid fa-bars"></i>
</button>

<div id="sidebar"
    class="fixed right-0 top-0 h-full w-64 bg-gradient-to-b from-teal-500 to-teal-600 backdrop-blur-sm shadow-2xl transform translate-x-full lg:translate-x-0 transition-transform duration-300 z-40">

    <div class="p-6">
        <div class="flex items-center justify-center mb-8">
            <div class="px-6 py-3 rounded-2xl bg-white/10 backdrop-blur-md shadow-lg border border-white/20">
                <h1 class="text-xl font-extrabold tracking-wide text-white">
                    نوب <span class="text-yellow-300"> شوب</span>
                </h1>
            </div>
        </div>

        @php
            $active = 'bg-white bg-opacity-20';
        @endphp


        <nav class="space-y-2">

            {{-- Dashboard --}}
            <a href="{{ route('superadmin.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white
            {{ request()->routeIs('superadmin.index') ? $active : 'hover:bg-white hover:bg-opacity-10' }}">
                <i class="fa-solid fa-gauge-high w-5 text-center"></i>
                <span class="font-semibold f-13">لوحة التحكم</span>
            </a>

            {{-- Tenants --}}
            <a href="{{ route('superadmin.tenants') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white
                 {{ request()->routeIs('superadmin.tenants') ? $active : 'hover:bg-white hover:bg-opacity-10' }}">
                <i class="fa-solid fa-building w-5 text-center"></i>
                <span class="font-semibold f-13">إدارة التجار</span>
            </a>

            {{-- Subscriptions --}}
            <a href="{{ route('superadmin.subscriptions') }}"
                class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white
                 {{ request()->routeIs('superadmin.subscriptions') ? $active : 'hover:bg-white hover:bg-opacity-10' }}">
                <i class="fa-solid fa-layer-group w-5 text-center"></i>
                <span class="font-semibold f-13">إدارة الاشتراكات</span>
            </a>

            {{-- Plans --}}
            <a href="{{ route('superadmin.plans.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white
                 {{ request()->routeIs('superadmin.plans.index') ? $active : 'hover:bg-white hover:bg-opacity-10' }}">
                <i class="fa-solid fa-credit-card w-5 text-center"></i>
                <span class="font-semibold f-13">إدارة الباقات</span>
            </a>

            {{-- Payments Methods --}}
            <a href="{{ route('superadmin.payment-methods.index') }}"
                class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white
                {{ request()->routeIs('superadmin.payment-methods.index') ? $active : 'hover:bg-white hover:bg-opacity-10' }}">
                <i class="fa-solid fa-credit-card w-5 text-center"></i>
                <span class="font-semibold f-13">طرق الدفع</span>
            </a>

            {{-- Payments --}}
            <a href="{{ route('superadmin.payments.index') }}"
                class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white
                {{ request()->routeIs('superadmin.payments.index') ? $active : 'hover:bg-white hover:bg-opacity-10' }}">
                <i class="fa-solid fa-credit-card w-5 text-center"></i>
                <span class="font-semibold f-13">المدفوعات والفوترة</span>
            </a>

            {{-- Platform Settings --}}
            <a href="" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white">
                <i class="fa-solid fa-sliders w-5 text-center"></i>
                <span class="font-semibold f-13">إعدادات المنصة</span>
            </a>


            {{-- Support --}}
            <a href="" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white">
                <i class="fa-solid fa-headset w-5 text-center"></i>
                <span class="font-semibold f-13">الدعم الفني</span>
            </a>

            {{-- Logout --}}
            <a href=""
                class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white hover:bg-white hover:bg-opacity-10">
                <i class="fa-solid fa-arrow-right-from-bracket w-5 text-center"></i>
                <span class="font-semibold f-13">تسجيل الخروج</span>
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