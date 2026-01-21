@extends('super-admin.layouts.app')

@section('title', 'مدفوعات التجار')

@section('contain')
    <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">


        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">قيد المراجعة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $payments->where('status', 'pending')->count() }}
                        </p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">المقبولة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $payments->where('status', 'approved')->count() }}
                        </p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-red-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">المرفوضة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $payments->where('status', 'rejected')->count() }}
                        </p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">إجمالي المدفوعات</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $payments->total() }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mt-6 border border-gray-200">

            <!-- Table Header -->
            <div class="bg-gradient-to-b from-teal-500 to-teal-600  px-6 py-4">
                <h3 class="text-white font-bold text-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    قائمة المدفوعات
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-right">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                    <span>رقم العملية</span>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span>المتجر</span>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>الباقة</span>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <span>طريقة الدفع</span>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>المبلغ</span>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span>المرجع</span>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>الحالة</span>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                                    <span>الإجراء</span>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse ($payments as $payment)
                            <tr class="hover:bg-gray-50 transition-colors">

                                <td class="p-4">
                                    <div class="flex items-center gap-2 justify-start">
                                        <span class="font-bold text-gray-900">#{{ $payment->id }}</span>
                                    </div>
                                </td>

                                <td class="p-4">
                                    <div class="flex items-center gap-3 justify-start">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white font-bold">
                                            {{ mb_substr($payment->tenant->name, 0, 1) }}
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">{{ $payment->tenant->name }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-4">
                                    <div
                                        class="inline-flex items-center gap-2 bg-purple-50 text-purple-700 px-3 py-2 rounded-lg font-medium">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $payment->plan->name }}
                                    </div>
                                </td>

                                <td class="p-4">
                                    <div class="flex items-center gap-2 justify-start text-gray-700">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        <span class="font-medium">{{ $payment->method->bank_name }}</span>
                                    </div>
                                </td>

                                <td class="p-4">
                                    <div
                                        class="inline-flex items-center gap-2 bg-green-50 text-green-700 px-3 py-2 rounded-lg font-bold">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ number_format($payment->amount) }} ج.س
                                    </div>
                                </td>

                                <td class="p-4">
                                    <div class="text-left">
                                        <code class="bg-gray-100 px-2 py-1 rounded text-xs font-mono text-gray-700">
                                                                                                                                                                                                                                            {{ $payment->transaction_reference }}
                                                                                                                                                                                                                                        </code>
                                    </div>
                                </td>

                                <td class="p-4">
                                    @php
                                        $statusConfig = [
                                            'approved' => [
                                                'label' => 'مقبول',
                                                'class' => 'bg-green-100 text-green-700 border-green-200',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>'
                                            ],
                                            'rejected' => [
                                                'label' => 'مرفوض',
                                                'class' => 'bg-red-100 text-red-700 border-red-200',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>'
                                            ],
                                            'pending' => [
                                                'label' => 'قيد المراجعة',
                                                'class' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>'
                                            ]
                                        ];
                                        $status = $statusConfig[$payment->status] ?? $statusConfig['pending'];
                                    @endphp

                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg border {{ $status['class'] }}">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            {!! $status['icon'] !!}
                                        </svg>
                                        {{ $status['label'] }}
                                    </span>
                                </td>

                                <td class="p-4">
                                    <div class="flex gap-2 items-center justify-start">
                                        @if ($payment->status === 'pending')
                                            <form method="POST" action="{{ route('superadmin.payments.approve', $payment) }}">
                                                @csrf
                                                <button type="submit" onclick="return confirm('هل أنت متأكد من قبول هذه الدفعة؟')"
                                                    class="bg-green-500 hover:bg-green-600 text-white text-sm font-bold px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    قبول
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('superadmin.payments.reject', $payment) }}">
                                                @csrf
                                                <button type="submit" onclick="return confirm('هل أنت متأكد من رفض هذه الدفعة؟')"
                                                    class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    رفض
                                                </button>
                                            </form>
                                        @else
                                            <div class="flex items-center gap-2 text-gray-400 font-medium">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                                تم المعالجة
                                            </div>
                                        @endif
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900">لا توجد عمليات دفع</h3>
                                            <p class="text-gray-500 mt-1">لم يتم تسجيل أي عمليات دفع حتى الآن</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                {{ $payments->links() }}
            </div>

        </div>
    </div>
@endsection