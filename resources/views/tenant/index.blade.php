@extends('tenant.layouts.app')

@section('title', '')

@section('contain')
    <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">


        <x-page-header title=" {{ $tenantName }}"
            description=" منصة لإدارة خدمات الألعاب، تشمل شحن الألعاب، بيع بطاقات، وتنظيم الطلبات بشكل آمن وسريع" />

        {{-- Stats Grid --}}
        <div class="grid mt-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- Total Users --}}
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 text-gray-600 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <p class="text-sm font-medium">إجمالي العملاء</p>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">
                            {{ number_format($totalUsers) }}
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">جميع المستخدمين المسجلين</p>
                    </div>
                    <div
                        class="w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 border border-blue-200">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Total Completed Orders --}}
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 text-gray-600 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm font-medium">الطلبات المكتملة</p>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">
                            {{ number_format($totalOrders) }}
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">طلبات تم إتمامها بنجاح</p>
                    </div>
                    <div
                        class="w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-purple-100 to-purple-50 border border-purple-200">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Gift Cards Sold --}}
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 text-gray-600 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                            </svg>
                            <p class="text-sm font-medium">بطاقات الهدايا</p>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">
                            {{ number_format($totalGiftCardSold) }}
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">بطاقات تم بيعها</p>
                    </div>
                    <div
                        class="w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-pink-100 to-pink-50 border border-pink-200">
                        <svg class="w-7 h-7 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Total Wallet Balance --}}
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 text-gray-600 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm font-medium">رصيد المحافظ</p>
                        </div>
                        <h2 class="text-2xl font-bold text-teal-600">
                            {{ number_format($totalBalance) }}
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">ج.س - إجمالي الأرصدة</p>
                    </div>
                    <div
                        class="w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-teal-100 to-teal-50 border border-teal-200">
                        <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>

        {{-- Quick Stats --}}
        <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Recent Activity --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        نشاط سريع
                    </h3>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">عملاء جدد اليوم</p>
                            <p class="text-xs text-gray-500">{{ number_format($totalUsers) }} مستخدم</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">طلبات اليوم</p>
                            <p class="text-xs text-gray-500">{{ number_format($totalOrders) }} طلب</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Performance Overview --}}
            <div class="bg-gradient-to-br from-teal-600 to-cyan-600 rounded-xl shadow-sm p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        نظرة عامة على الأداء
                    </h3>
                </div>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-white/90">معدل الطلبات</span>
                            <span class="font-bold">{{ $totalOrders > 0 ? '100%' : '0%' }}</span>
                        </div>
                        <div class="bg-white/20 rounded-full h-2 overflow-hidden">
                            <div class="bg-white h-2 rounded-full transition-all"
                                style="width: {{ $totalOrders > 0 ? '100' : '0' }}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-white/90">معدل المبيعات</span>
                            <span class="font-bold">{{ $totalGiftCardSold > 0 ? '85%' : '0%' }}</span>
                        </div>
                        <div class="bg-white/20 rounded-full h-2 overflow-hidden">
                            <div class="bg-white h-2 rounded-full transition-all"
                                style="width: {{ $totalGiftCardSold > 0 ? '85' : '0' }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection