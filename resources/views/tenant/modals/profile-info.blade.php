{{-- Profile Header --}}
<div class="bg-white rounded-3xl shadow mb-8 overflow-hidden">

    {{-- Top Gradient --}}
    <div class="relative h-40 bg-gradient-to-b from-teal-500 to-teal-600">
        <div class="absolute inset-0 opacity-20 bg-gradient-to-b from-teal-500 to-teal-600  text-white">
        </div>
    </div>

    {{-- Profile Info --}}
    <div class="relative -mt-20 flex flex-col items-center text-center pb-6">

        {{-- Avatar --}}
        <div class="relative">
            <div class="w-28 h-28 rounded-full bg-gradient-to-b from-teal-500 to-teal-600
            flex items-center justify-center text-white text-5xl font-bold
            ring-4 ring-white shadow-lg">
                {{ $user->initial }}
            </div>


            <span class="absolute bottom-1 right-1 w-7 h-7 rounded-full bg-green-500
                       flex items-center justify-center ring-2 ring-white">
                <i class="fa-solid fa-check text-white text-xs"></i>
            </span>
        </div>

        {{-- Name --}}
        <h2 class="mt-3 text-lg font-bold text-gray-800">
            {{ $user->name }}
        </h2>

        {{-- Role --}}
        <span class="mt-1 px-4 py-1 rounded-full text-xs font-semibold
                   bg-teal-500 text-white">
            Admin
        </span>

        {{-- Member Since --}}
        <p class="mt-2 text-xs text-gray-500 flex items-center gap-1">
            عضو منذ {{ $user->member_since_days }} يوم
            <i class="fa-solid fa-calendar-check text-teal-500"></i>
        </p>

    </div>
</div>

{{-- Info Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 text-sm">


    {{-- Phone --}}
    <div class="bg-white rounded-2xl shadow p-5 flex items-center justify-between">
        <div>
            <p class="text-gray-500 mb-1">رقم الهاتف</p>
            <p class="font-semibold text-gray-800">
                {{ $user->phone }}
            </p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-500 flex items-center justify-center">
            <i class="fa-solid fa-phone"></i>
        </div>
    </div>

    {{-- Email --}}
    <div class="bg-white rounded-2xl shadow p-5 flex items-center justify-between">
        <div class="truncate">
            <p class="text-gray-500 mb-1">البريد الإلكتروني</p>
            <p class="font-semibold text-gray-800 truncate">
                {{ $user->email }}
            </p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-500 flex items-center justify-center">
            <i class="fa-solid fa-envelope"></i>
        </div>
    </div>
</div>