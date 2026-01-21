@extends('tenant.layouts.app')

@section('title', 'انتهى الاشتراك')

@section('contain')
    <div class="min-h-screen bg-gray-50 py-8 px-4">
        <div class="max-w-6xl mx-auto">

            <!-- Alert Banner -->
            <div class="mb-6 bg-white rounded-xl shadow-sm border-r-4 border-red-500 p-4 flex items-center gap-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="flex-1 text-right">
                    <h3 class="text-base font-bold text-gray-900 mb-1">اشتراكك قد انتهى</h3>
                    <p class="text-sm text-gray-600">لا يمكنك الوصول إلى ميزات المنصة حتى تقوم بتجديد اشتراكك.</p>
                </div>
            </div>

            <section id="pricing">

                <!-- Section Header -->
                <div class="text-center mb-8">

                    <h2 class="text-2xl font-bold text-gray-900 mb-2">
                        جدد اشتراكك الآن
                    </h2>

                    <p class="text-sm text-gray-600 max-w-2xl mx-auto">
                        اختر الباقة المناسبة لك للعودة إلى العمل فورًا
                    </p>
                </div>

                <!-- Plans Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($plans as $index => $plan)
                                @php
                                    $isPopular = $index === 0;
                                    $isFree = $plan->price == 0;
                                @endphp

                                <div
                                    class="relative rounded-xl p-6 text-center bg-white border h-full flex flex-col
                                                                                                                                                            {{ $isPopular ? 'border-teal-600 shadow-lg' : 'border-gray-200 shadow-sm' }}
                                                                                                                                                            hover:shadow-md transition-all duration-300">

                                    <!-- Popular Badge -->
                                    @if ($isPopular)
                                        <span
                                            class="absolute -top-3 right-1/2 translate-x-1/2 bg-teal-600 text-white text-xs px-3 py-1 rounded-full">
                                            الأكثر استخدامًا
                                        </span>
                                    @endif

                                    <!-- Plan Name -->
                                    <h3 class="text-lg font-bold text-gray-900 mb-4 mt-2">
                                        {{ $plan->name }}
                                    </h3>

                                    <!-- Price -->
                                    <div class="my-4">
                                        <div class="flex items-baseline justify-center gap-1">
                                            <span class="text-3xl font-bold text-gray-900">
                                                {{ number_format($plan->price) }}
                                            </span>
                                            <span class="text-sm text-gray-600">ج.س / شهر</span>
                                        </div>
                                    </div>

                                    <!-- Features -->
                                    <ul class="space-y-2.5 text-xs text-gray-600 text-right mb-6 flex-1">
                                        @foreach ($plan->features as $feature)
                                            <li class="flex items-start gap-2">
                                                <span class="text-teal-600 text-sm mt-0.5">✔</span>
                                                <span>{{ $feature->name }}</span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <!-- Action Button -->
                                    <form method="POST" action="{{ route('merchant.plans.subscribe', $plan) }}">
                                        @csrf

                                        <button class="block w-full py-2.5 rounded-lg font-semibold text-sm transition-all
                                                                                                                                                                    {{ $isPopular
                        ? 'bg-teal-600 hover:bg-teal-700 text-white shadow-sm'
                        : ($isFree
                            ? 'bg-gray-900 hover:bg-gray-800 text-white'
                            : 'bg-teal-600 hover:bg-teal-700 text-white shadow-sm') }}">
                                            {{ $isFree ? 'ابدأ مجانًا' : 'اشترك الآن' }}
                                        </button>
                                    </form>
                                </div>
                    @endforeach
                </div>

                <!-- Bottom Info -->
                <div class="mt-8 bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                    <div class="flex items-center justify-center gap-6 text-xs text-gray-600 flex-wrap">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>دفع آمن ومشفر</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>تفعيل فوري</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <span>دعم فني 24/7</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection