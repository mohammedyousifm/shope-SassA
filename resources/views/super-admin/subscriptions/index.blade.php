@extends('super-admin.layouts.app')

@section('title', 'إدارة الاشتراكات')

@section('contain')
    <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">


        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">الاشتراكات النشطة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $tenants->where('status', 'active')->count() }}
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
                        <p class="text-sm text-gray-600">الاشتراكات الموقوفة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $tenants->where('status', '!=', 'active')->count() }}
                        </p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">إجمالي المتاجر</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $tenants->total() }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">الباقات المتاحة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $plans->count() }}</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            <div class="bg-gradient-to-l from-teal-600 to-cyan-600 px-6 py-4">
                <h3 class="text-white font-bold text-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    قائمة المتاجر والاشتراكات
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-right">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>المتجر</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>الباقة الحالية</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>تاريخ الانتهاء</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>الحالة</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>إدارة الاشتراك</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>إدارة الاشتراك</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    </svg>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse($tenants as $tenant)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="p-4">
                                                <div class="flex items-center gap-3 justify-start">
                                                    <div
                                                        class="w-10 h-10 rounded-lg bg-gradient-to-br from-teal-400 to-cyan-500 flex items-center justify-center text-white font-bold">
                                                        {{ $tenant->id }}
                                                    </div>
                                                    <div class="text-right">
                                                        <p class="font-bold text-gray-900">{{ $tenant->name }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="p-4">
                                                <div
                                                    class="inline-flex items-center gap-2 bg-teal-50 text-teal-700 px-3 py-2 rounded-lg font-medium">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                        <path fill-rule="evenodd"
                                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ $tenant->plan->name ?? ""}}
                                                </div>
                                            </td>

                                            <td class="p-4">
                                                @if($tenant->subscription_ends_at)
                                                    <div class="inline-flex items-center gap-2 text-gray-700">
                                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        <span class="font-medium">{{ $tenant->subscription_ends_at->format('Y-m-d') }}</span>
                                                    </div>
                                                    @php
                                                        $daysLeft = now()->diffInDays($tenant->subscription_ends_at, false);
                                                    @endphp
                                                    @if($daysLeft >= 0 && $daysLeft <= 7)
                                                        <div class="text-xs text-orange-600 mt-1 font-medium">
                                                            متبقي {{ $daysLeft }} يوم
                                                        </div>
                                                    @endif
                                                @else
                                                    <span class="text-gray-400 font-medium">—</span>
                                                @endif
                                            </td>

                                            <td class="p-4">
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg
                                                                                                                                                                                                                                                                    {{ $tenant->status === 'active'
                            ? 'bg-green-100 text-green-700 border border-green-200'
                            : 'bg-red-100 text-red-700 border border-red-200' }}">
                                                    @if($tenant->status === 'active')
                                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        نشط
                                                    @elseif($tenant->status === 'pending')
                                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        قيد المراجعة
                                                    @else
                                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        موقوف
                                                    @endif
                                                </span>
                                            </td>

                                            <td class="p-4">
                                                <form method="POST" action="{{ route('superadmin.subscriptions.assign', $tenant) }}"
                                                    class="flex gap-2 items-center justify-start">
                                                    @csrf

                                                    <select name="plan_id"
                                                        class="border-2 border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-all bg-white">
                                                        @foreach($plans as $plan)
                                                            <option value="{{ $plan->id }}" {{ $tenant->plan_id == $plan->id ? 'selected' : '' }}>
                                                                {{ $plan->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <button type="submit"
                                                        class="bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white text-sm font-bold px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        حفظ
                                                    </button>
                                                </form>
                                            </td>

                                            <td>
                                                <!-- Block/Unblock Form -->
                                                <form method="POST" action="{{ route('superadmin.subscriptions.toggle-status', $tenant) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    @if($tenant->status === 'active')
                                                        <button type="submit" onclick="return confirm('هل أنت متأكد من حظر هذا المتجر؟')"
                                                            class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2"
                                                            title="حظر المتجر">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                                            </svg>
                                                            حظر
                                                        </button>
                                                    @elseif($tenant->status === 'suspended')
                                                        <button type="submit" onclick="return confirm('هل أنت متأكد من إلغاء حظر هذا المتجر؟')"
                                                            class="bg-green-500 hover:bg-green-600 text-white text-sm font-bold px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2"
                                                            title="إلغاء حظر المتجر">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            تفعيل
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            class="bg-green-500 cursor-not-allowed hover:bg-green-600 text-white text-sm font-bold px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            ----
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900">لا توجد متاجر</h3>
                                            <p class="text-gray-500 mt-1">لم يتم العثور على أي متاجر مسجلة</p>
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
                {{ $tenants->links() }}
            </div>

        </div>
    </div>
@endsection