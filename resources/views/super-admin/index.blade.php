@extends('super-admin.layouts.app')
@section('title', 'نوب شوب - لوحة التحكم')
@section('contain')
    <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        {{-- Header Banner --}}
        <x-page-header title="نوب شوب"
            description="منصة لإدارة خدمات الألعاب، تشمل شحن الألعاب، بيع بطاقات، وتنظيم الطلبات بشكل آمن وسريع" />

        {{-- Stats Grid --}}
        <div class="grid mt-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- Total Merchants --}}
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 text-gray-600 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <p class="text-sm font-medium">إجمالي التجار</p>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">
                            {{ number_format($merchantsCount) }}
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">جميع المتاجر المسجلة</p>
                    </div>
                    <div
                        class="w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 border border-blue-200">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Active Merchants --}}
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 text-gray-600 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm font-medium">التجار النشطين</p>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">
                            {{ number_format($activeMerchantsCount) }}
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">المتاجر الفعالة حاليًا</p>
                    </div>
                    <div
                        class="w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-green-100 to-green-50 border border-green-200">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 text-gray-600 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                            <p class="text-sm font-medium">التجار قيد المراجعة</p>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">
                            {{ number_format($pendingMerchantsCount) }}
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">المتاجر قيد المراجعة</p>
                    </div>
                    <div
                        class="w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-red-100 to-red-50 border border-red-200">
                        <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Suspended Merchants --}}
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 text-gray-600 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                            <p class="text-sm font-medium">التجار الموقوفين</p>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">
                            {{ number_format($suspendedMerchantsCount) }}
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">المتاجر المعلقة</p>
                    </div>
                    <div
                        class="w-14 h-14 flex items-center justify-center rounded-xl bg-gradient-to-br from-red-100 to-red-50 border border-red-200">
                        <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </div>
                </div>
            </div>



            {{-- Total Payments --}}
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 text-gray-600 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm font-medium">إجمالي المدفوعات</p>
                        </div>
                        <h2 class="text-2xl font-bold text-teal-600">
                            {{ number_format($platformPaymentsSum) }}
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">ج.س - جميع المدفوعات</p>
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
        <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Percentage Cards --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-gray-700">نسبة التجار النشطين</h3>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                @php
                    $activePercentage = $merchantsCount > 0 ? round(($activeMerchantsCount / $merchantsCount) * 100, 1) : 0;
                @endphp
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold text-gray-900">{{ $activePercentage }}%</span>
                    <span class="text-sm text-green-600 mb-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                clip-rule="evenodd" />
                        </svg>
                        نشط
                    </span>
                </div>
                <div class="mt-4 bg-gray-200 rounded-full h-2 overflow-hidden">
                    <div class="bg-green-600 h-2 rounded-full transition-all" style="width: {{ $activePercentage }}%"></div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-gray-700">نسبة التجار الموقوفين</h3>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                @php
                    $suspendedPercentage = $merchantsCount > 0 ? round(($suspendedMerchantsCount / $merchantsCount) * 100, 1) : 0;
                @endphp
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold text-gray-900">{{ $suspendedPercentage }}%</span>
                    <span class="text-sm text-red-600 mb-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z"
                                clip-rule="evenodd" />
                        </svg>
                        موقوف
                    </span>
                </div>
                <div class="mt-4 bg-gray-200 rounded-full h-2 overflow-hidden">
                    <div class="bg-red-600 h-2 rounded-full transition-all" style="width: {{ $suspendedPercentage }}%">
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-teal-600 to-cyan-600 rounded-xl shadow-sm p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold">متوسط الدفع لكل تاجر</h3>
                    <svg class="w-5 h-5 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                @php
                    $avgPayment = $merchantsCount > 0 ? round($platformPaymentsSum / $merchantsCount, 0) : 0;
                @endphp
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold">{{ number_format($avgPayment) }}</span>
                    <span class="text-sm text-teal-100 mb-1">ج.س</span>
                </div>
                <p class="text-xs text-teal-100 mt-2">إجمالي المدفوعات ÷ عدد التجار</p>
            </div>

        </div>

    </div>
@endsection