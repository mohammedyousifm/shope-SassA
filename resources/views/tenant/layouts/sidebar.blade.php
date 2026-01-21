<!-- Toggle Button (Mobile Only) -->
<button id="toggleSidebarBtn" class="lg:hidden fixed top-4 right-4 w-12 h-12 flex items-center justify-center
    rounded-xl bg-white shadow-lg hover:shadow-xl transition-all z-50 border border-gray-200">
    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

<!-- Overlay for Mobile -->
<div id="sidebarOverlay" class="lg:hidden fixed inset-0 bg-black/50 backdrop-blur-sm opacity-0 pointer-events-none
transition-opacity duration-300 z-30"></div>

<!-- Sidebar -->
<div id="sidebar"
    class="fixed right-0 top-0 h-full w-64 bg-white shadow-2xl transform translate-x-full lg:translate-x-0 transition-transform duration-300 z-40 border-l border-gray-200">

    <div class="flex flex-col h-full">

        <!-- Logo Section -->
        <div class="p-6 bg-gradient-to-br from-teal-500 via-teal-600 to-cyan-600">
            <div class="flex items-center justify-center mb-2">
                <div class="px-6 py-3 rounded-2xl bg-white/10 backdrop-blur-md shadow-lg border border-white/20">
                    <h1 class="text-2xl font-extrabold tracking-wide text-white">
                        {{ $tenantName }}
                    </h1>
                </div>
            </div>
            <p class="text-center text-white/80 text-xs">منصة إدارة المتاجر الرقمية</p>
        </div>

        @php
            $active = 'bg-gradient-to-l from-teal-50 to-cyan-50 text-teal-700 border-r-4 border-teal-600 shadow-sm';
            $inactive = 'text-gray-700 hover:bg-gray-50 border-r-4 border-transparent';
        @endphp

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto p-2 pt-4 space-y-2">

            <!-- Dashboard -->
            <a href="{{ route('tenant.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
                {{ request()->routeIs('tenant.index') ? $active : $inactive }}">
                <div class="w-10 h-10 flex items-center justify-center rounded-lg
                    {{ request()->routeIs('tenant.index') ? 'bg-teal-100' : 'bg-gray-100 group-hover:bg-teal-50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('tenant.index') ? 'text-teal-600' : 'text-gray-600 group-hover:text-teal-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <span class="font-semibold text-sm">لوحة التحكم</span>
            </a>

            <!-- Games Management -->
            <a href="{{ route('tenant.products') }}" class="flex items-center gap-3 px-1 py-4 rounded-lg transition-all group
                {{ request()->routeIs('tenant.products.*') ? $active : $inactive }}">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-lg
                    {{ request()->routeIs('dashboard.games.*') ? 'bg-teal-100' : 'bg-gray-100 group-hover:bg-teal-50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard.games.*') ? 'text-teal-600' : 'text-gray-600 group-hover:text-teal-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                    </svg>
                </div>
                <span class="font-semibold text-sm">المنتجات</span>
            </a>

            <!-- Gift Cards -->
            <a href="{{ route('tenant.code.products') }}" class="flex items-center gap-3 px-1 py-4 rounded-lg transition-all group
                {{ request()->routeIs('tenant.code.products.*') ? $active : $inactive }}">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-lg
                    {{ request()->routeIs('dashboard.cardcode.*') ? 'bg-teal-100' : 'bg-gray-100 group-hover:bg-teal-50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard.cardcode.*') ? 'text-teal-600' : 'text-gray-600 group-hover:text-teal-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                </div>
                <span class="font-semibold text-sm">بطاقات الشحن</span>
            </a>

            <!-- Clients -->
            <a href="{{ route('tenant.clients') }}" class="flex items-center gap-3 px-1 py-4 rounded-lg transition-all group
                {{ request()->routeIs('tenant.clients') ? $active : $inactive }}">
                <div class="w-10 h-10 flex items-center justify-center rounded-lg
                    {{ request()->routeIs('tenant.clients') ? 'bg-teal-100' : 'bg-gray-100 group-hover:bg-teal-50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('tenant.clients') ? 'text-teal-600' : 'text-gray-600 group-hover:text-teal-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <span class="font-semibold text-sm">إدارة العملاء</span>
            </a>

            <!-- Orders -->
            <a href="" class="flex items-center gap-3 px-1 py-4 rounded-lg transition-all group
                {{ request()->routeIs('dashboard.orders*') ? $active : $inactive }}">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-lg
                    {{ request()->routeIs('dashboard.orders*') ? 'bg-teal-100' : 'bg-gray-100 group-hover:bg-teal-50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard.orders*') ? 'text-teal-600' : 'text-gray-600 group-hover:text-teal-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <span class="font-semibold text-sm">إدارة الطلبات</span>
            </a>

            <!-- Wallet Deposits -->
            <a href="{{ route('tenant.deposits') }}" class="flex items-center gap-3 px-1 py-4 rounded-lg transition-all group
                {{ request()->routeIs('tenant.deposits.*') ? $active : $inactive }}">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-lg
                    {{ request()->routeIs('tenant.deposits.*') ? 'bg-teal-100' : 'bg-gray-100 group-hover:bg-teal-50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('tenant.deposits.*') ? 'text-teal-600' : 'text-gray-600 group-hover:text-teal-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <span class="font-semibold text-sm">إيداعات المحفظة</span>
            </a>

            <!-- Divider -->
            <div class="my-4 border-t border-gray-200"></div>

            <!-- Profile -->
            <a href="{{ route('tenant.subscriptions.expired') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
                {{ request()->routeIs('dashboard.profile') ? $active : $inactive }}">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-lg
                    {{ request()->routeIs('dashboard.profile') ? 'bg-teal-100' : 'bg-gray-100 group-hover:bg-teal-50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard.profile') ? 'text-teal-600' : 'text-gray-600 group-hover:text-teal-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <span class="font-semibold text-sm">الملف الشخصي</span>
            </a>

            <!-- Logout -->
            <a href=""
                class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group text-red-600 hover:bg-red-50 border-r-4 border-transparent hover:border-red-600">
                <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-red-50 group-hover:bg-red-100">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>
                <span class="font-semibold text-sm">تسجيل الخروج</span>
            </a>

        </nav>

        <!-- Footer -->
        <div class="p-4 bg-gray-50 border-t border-gray-200">
            <div class="flex items-center gap-3 px-3 py-2 bg-white rounded-lg shadow-sm border border-gray-200">
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center text-white font-bold">
                    A
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-900 truncate">اسم المستخدم</p>
                    <p class="text-xs text-gray-500 truncate">admin@example.com</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("toggleSidebarBtn");
    const overlay = document.getElementById("sidebarOverlay");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("translate-x-full");

        if (window.innerWidth < 1024) {
            overlay.classList.toggle("opacity-0");
            overlay.classList.toggle("pointer-events-none");
        }
    });

    // Close sidebar when clicking overlay
    overlay.addEventListener("click", () => {
        sidebar.classList.add("translate-x-full");
        overlay.classList.add("opacity-0");
        overlay.classList.add("pointer-events-none");
    });

    // Close sidebar when clicking outside (optional)
    document.addEventListener("click", (e) => {
        if (
            !sidebar.contains(e.target) &&
            !toggleBtn.contains(e.target) &&
            window.innerWidth < 1024 &&
            !sidebar.classList.contains("translate-x-full")
        ) {
            sidebar.classList.add("translate-x-full");
            overlay.classList.add("opacity-0");
            overlay.classList.add("pointer-events-none");
        }
    });
</script>