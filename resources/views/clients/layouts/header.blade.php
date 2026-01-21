<!-- Header -->
<header class="bg-white shadow-md px-6 py-4 flex items-center justify-between">


    <div class="flex items-center"></div>

    <div class="flex items-center gap-2">

        <div class="relative">
            <!-- Bell Button -->
            <button id="notificationBtn" class="flex items-center bg-green-50 rounded-lg px-1 py-1 focus:outline-none">
                <div
                    class="w-9 h-9 bg-gradient-to-b from-teal-500 to-teal-600 rounded-lg flex items-center justify-center text-white relative">
                    <i class="fa-solid fa-bell"></i>

                    <!-- Notification dot -->
                    {{-- @if ($unreadCount > 0)
                    <span class="absolute -top-1 -right-1
                                 min-w-[18px] h-[18px]
                                 px-1
                                 bg-red-500 text-white
                                 text-[11px] font-bold
                                 rounded-full
                                 flex items-center justify-center
                                 leading-none">
                        {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                    </span>
                    @endif --}}


                </div>
            </button>

            <!-- Dropdown -->
            <div id="notificationDropdown" style="margin-right: -5rem"
                class="hidden absolute  mt-2 w-80 bg-white border border-gray-200 rounded-xl shadow-lg z-50">

                <!-- Header -->
                <div class="flex items-center justify-between px-4 py-3 border-b">
                    <h3 class="font-bold text-gray-700 flex items-center gap-2">
                        <i class="fa-solid fa-bell text-blue-500"></i>
                        الإشعارات
                    </h3>
                    <a id="markAllAsRead" class="text-sm cursor-pointer  text-blue-600 hover:underline">
                        قراءة الكل
                    </a>

                </div>


                <!-- Notifications list -->
                <div class="max-h-96 overflow-y-auto divide-y">
                    {{--
                    @forelse ($notifications as $notification)
                    <div class="flex gap-3 px-4 py-3 hover:bg-gray-50
                             {{ is_null($notification->read_at) ? 'bg-blue-50' : '' }}">

                        <div class="w-9 h-9 rounded-full flex items-center justify-center
                                 @switch($notification->type)
                                     @case('wallet_deposit') bg-green-100 text-green-600 @break
                                     @case('deposit_status_changed') bg-yellow-100 text-yellow-600 @break
                                     @case('order_status_changed') bg-red-100 text-red-600 @break
                                     @default bg-blue-100 text-blue-600
                                 @endswitch
                             ">
                            <i class="fa-solid fa-bell"></i>
                        </div>


                        <div class="flex-1 text-sm text-right">
                            <p class="font-semibold text-gray-700">
                                {{ $notification->data['title'] ?? 'إشعار' }}
                            </p>

                            @if(!empty($notification->data['admin_message']))
                            <p class="text-gray-500">
                                {{ $notification->data['admin_message'] }}
                            </p>
                            @elseif(!empty($notification->data['amount']))
                            <p class="text-gray-500">
                                المبلغ: {{ $notification->data['amount'] }}
                            </p>
                            @endif

                            <span class="text-xs text-gray-400">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="px-4 py-6 text-center text-gray-400 text-sm">
                        لا توجد إشعارات
                    </div>
                    @endforelse --}}

                </div>

            </div>
        </div>


        <script>
            const btn = document.getElementById('notificationBtn');
            const dropdown = document.getElementById('notificationDropdown');

            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', () => {
                dropdown.classList.add('hidden');
            });
        </script>

        <!-- Balance -->
        <div class="flex items-center gap-2 bg-green-50 rounded-lg px-2 py-1">
            <div class="w-9 h-9 bg-gradient-to-b from-teal-500 to-teal-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                    </path>
                </svg>
            </div>
            <div class="text-right">
                <p class="text-xs text-gray-500">الرصيد</p>
                <p class="f-13 font-bold text-green-600">{{ number_format($userBalance ?? 0) }} ج.س</p>

            </div>
        </div>

        <!-- User Profile -->
        <a href="{{ route('clients.profile') }}" class="flex items-center gap-2 rounded-full px-2 py-1 cursor-pointer
                                          bg-green-50 hover:bg-green-100 transition">

            {{-- Avatar --}}
            <div class="w-9 h-9 bg-gradient-to-b from-teal-500 to-teal-600
                                               rounded-full flex items-center justify-center
                                               text-white font-bold relative">

                {{ mb_substr($client->name, 0, 1) }}

                {{-- Online indicator --}}
                <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400
                                                   rounded-full border-2 border-white">
                </span>
            </div>

            {{-- Name --}}
            <span class="text-sm font-semibold text-gray-700">
                {{ Str::limit($client->name, 4, '') }}
            </span>

        </a>

    </div>

    {{--
    <script>
        document.getElementById('markAllAsRead')?.addEventListener('click', function (e) {
            e.preventDefault();

            fetch("{{ route('notifications.readAll') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json",
                }
            })
                .then(res => res.json())
                .then(() => {


                    const badge = document.querySelector('[data-notification-badge]');
                    if (badge) badge.remove();


                    document.querySelectorAll('.notification-item').forEach(el => {
                        el.classList.remove('bg-gray-100');
                    });
                });
        });
    </script> --}}


</header>