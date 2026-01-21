@extends('super-admin.layouts.app')

@section('title', 'إدارة التجار')

@section('contain')
    <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">


        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-1">
            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">إجمالي التجار</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $tenants->total() }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">التجار النشطين</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $tenants->where('status', '!=', 'suspended')->count() }}</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-red-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">التجار الموقوفين</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $tenants->where('status', 'suspended')->count() }}</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">تجار اليوم</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $tenants->where('created_at', '>=', now()->startOfDay())->count() }}</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Card --}}
        <div class="bg-white mt-6 rounded-xl shadow-lg overflow-hidden border border-gray-200">

            {{-- Search Bar --}}
            <div class="bg-gradient-to-l from-teal-600 to-cyan-600 px-6 py-4">
                <form method="GET" action="{{ route('superadmin.tenants') }}" class="flex flex-wrap gap-3 items-center">
                    <div class="flex-1 min-w-[250px]">
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="بحث باسم المتجر أو الدومين..."
                                class="w-full px-4 py-2 pr-10 border-2 border-white/20 rounded-lg text-sm bg-white/10 text-white placeholder-white/70 focus:ring-2 focus:ring-white/50 focus:border-white/30 focus:bg-white/20 outline-none" />
                            <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>

                    <button type="submit" class="px-5 py-2 bg-white text-teal-600 font-semibold text-sm rounded-lg hover:bg-gray-100 transition-colors shadow-md flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        بحث
                    </button>

                    <a href="{{ route('superadmin.tenants') }}"
                        class="px-5 py-2 bg-white/20 text-white font-semibold text-sm rounded-lg hover:bg-white/30 transition-colors border border-white/30 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        إعادة ضبط
                    </a>
                </form>
            </div>

            @if ($tenants->count())
                {{-- Responsive Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-right">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="px-4 py-3 font-bold text-gray-700 text-xs">
                                    <div class="flex items-center gap-2 justify-start">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 font-bold text-gray-700 text-xs">
                                    <div class="flex items-center gap-2 justify-start">
                                        <span>اسم التاجر</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 font-bold text-gray-700 text-xs">
                                    <div class="flex items-center gap-2 justify-start">
                                        <span>البريد الإلكتروني</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 font-bold text-gray-700 text-xs">
                                    <div class="flex items-center gap-2 justify-start">
                                        <span>رقم الهاتف</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 font-bold text-gray-700 text-xs">
                                    <div class="flex items-center gap-2 justify-start">
                                        <span>رابط المتجر</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 font-bold text-gray-700 text-xs">
                                    <div class="flex items-center gap-2 justify-start">
                                        <span>الحالة</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 font-bold text-gray-700 text-xs">
                                    <div class="flex items-center gap-2 justify-start">
                                        <span>الخطة</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 font-bold text-gray-700 text-xs">
                                    <div class="flex items-center gap-2 justify-start">
                                        <span>تاريخ الإنشاء</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach ($tenants as $tenant)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3 text-xs">
                                        <div class="flex items-center gap-2 justify-start">
                                            <span class="font-bold text-gray-900">#{{ $tenant->id }}</span>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3 justify-start">
                                              <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-teal-400 to-cyan-500 flex items-center justify-center text-white font-bold text-xs">
                                                {{ mb_substr($tenant->user->name, 0, 1) }}
                                            </div>
                                            <span class="font-bold text-gray-900 text-xs">{{ $tenant->user->name }}</span>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-xs text-gray-700">
                                        {{ $tenant->user->email }}
                                    </td>

                                    <td class="px-4 py-3 text-xs text-gray-700">
                                        {{ $tenant->user->phone ?? '—' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <a href="http://{{ $tenant->subdomain }}.subd.test" target="_blank"
                                            class="inline-flex items-center gap-1 text-xs text-teal-600 hover:text-teal-700 font-medium">
                                            {{ $tenant->subdomain }}.subd.test
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                            </svg>
                                        </a>
                                    </td>

                                    <td class="px-4 py-3">
                                        @if ($tenant->status === 'suspended')
                                            <span class="inline-flex items-center gap-1 px-2 py-1 text-xs rounded-lg bg-red-100 text-red-700 border border-red-200 font-bold">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                </svg>
                                                موقوف
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2 py-1 text-xs rounded-lg bg-green-100 text-green-700 border border-green-200 font-bold">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                نشط
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center gap-1 bg-purple-50 text-purple-700 px-2 py-1 rounded-lg text-xs font-medium">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $tenant->plan->name }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-xs text-gray-500">
                                        <div class="flex items-center gap-1 justify-start">
                                            <span>{{ $tenant->created_at->format('Y-m-d') }}</span>
                                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    {{ $tenants->links() }}
                </div>

            @else
                {{-- Empty State --}}
                <div class="text-center py-16">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">لا يوجد تجار</h3>
                    <p class="text-sm text-gray-500">لم يتم العثور على أي تجار مسجلين</p>
                </div>
            @endif

        </div>
    </div>
@endsection
