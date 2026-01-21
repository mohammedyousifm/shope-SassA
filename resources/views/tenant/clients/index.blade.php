@extends('tenant.layouts.app')

@section('title', 'العملاء')

@section('contain')

    <div class="p-4 lg:p-6">

        {{-- Header Banner --}}
        <x-page-header title="إدارة العملاء" description="إدارة حسابات العملاء ومتابعة نشاطهم ومعاملاتهم داخل النظام." />

        {{-- Card --}}
        <div class="bg-white mt-6 rounded-xl shadow-sm border border-gray-100 overflow-hidden">

            {{-- Search Form --}}
            <div class="p-6 border-b border-gray-100 bg-gradient-to-l from-gray-50 to-white">
                <form method="GET" action="" class="flex flex-wrap gap-3 items-center">

                    {{-- Search Input --}}
                    <div class="flex-1 min-w-[280px]">
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="بحث بالاسم أو رقم العميل أو البريد الإلكتروني..."
                                class="w-full px-4 py-3 pr-11 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all" />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex gap-2">
                        <button type="submit" class="px-5 py-3 bg-teal-600 text-white text-sm font-medium rounded-lg hover:bg-teal-700 transition-all duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            بحث
                        </button>

                        <a href="" class="px-5 py-3 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-all duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            إعادة ضبط
                        </a>
                    </div>
                </form>
            </div>

            @if ($users->count())

                {{-- Responsive Table --}}
                <div class="overflow-x-auto">
                    <table class="min-w-[900px] w-full text-sm text-right">
                        <thead class="bg-gradient-to-l from-gray-50 to-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-4 font-semibold">رقم العميل</th>
                                <th class="px-4 py-4 font-semibold">اسم العميل</th>
                                <th class="px-4 py-4 font-semibold">البريد الإلكتروني</th>
                                <th class="px-4 py-4 font-semibold">الحالة</th>
                                <th class="px-4 py-4 font-semibold">الرصيد</th>
                                <th class="px-4 py-4 text-center font-semibold">الإجراءات</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($users as $user)
                                <tr class="hover:bg-teal-50/50 transition-colors duration-150">

                                    {{-- Client Number --}}
                                    <td class="px-4 py-4">
                                        <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-mono font-semibold">
                                            #{{ $user->client_number }}
                                        </span>
                                    </td>

                                    {{-- Name --}}
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center text-white font-semibold">
                                                {{ mb_substr($user->name, 0, 1) }}
                                            </div>
                                            <span class="font-medium text-gray-900">{{ $user->name }}</span>
                                        </div>
                                    </td>
  {{-- Email --}}
                                    <td class="px-4 py-4">
                                        @php
                                            $emailParts = explode('@', $user->email);
                                            $username = $emailParts[0] ?? '';
                                            $domain = $emailParts[1] ?? 'domain.com';
                                            $shortEmail = substr($username, 0, 3) . '***@' . $domain;
                                        @endphp
                                        <button type="button"
                                            class="group cursor-pointer select-none text-sm bg-gray-100 hover:bg-teal-100 px-3 py-1.5 rounded-md transition-all duration-200 flex items-center gap-2"
                                            onclick="toggleEmail(this)"
                                            data-full="{{ $user->email }}"
                                            data-short="{{ $shortEmail }}">
                                            <span class="email-text">{{ $shortEmail }}</span>
                                            <svg class="w-4 h-4 text-gray-400 group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                    </td>


                                    {{-- Status --}}
                                    <td class="px-4 py-4">
                                        @if ($user->is_blocked)
                                            <span class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-full bg-red-100 text-red-700 border border-red-200">
                                                <svg class="w-3 h-3 ml-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"/>
                                                </svg>
                                                محظور
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700 border border-emerald-200">
                                                <svg class="w-3 h-3 ml-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                نشط
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Balance --}}
                                    <td class="px-4 py-4">
                                        <span class="inline-flex items-center gap-1.5 font-semibold text-teal-700">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ number_format($user->wallet->balance ?? 0) }} ج.س
                                        </span>
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">

                                            {{-- Add Balance --}}
                                            <button type="button"
                                                onclick="openBalanceModal({{ $user->id }}, '{{ $user->name }}')"
                                                class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-medium text-emerald-700 bg-emerald-50 rounded-lg hover:bg-emerald-100 border border-emerald-200 hover:border-emerald-300 transition-all duration-200"
                                                title="إضافة رصيد">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                                إضافة رصيد
                                            </button>

                                            {{-- Block/Unblock --}}
                                            <form method="POST" action="" class="inline">
                                                @csrf
                                                @method('PATCH')

                                                @if ($user->is_blocked)
                                                    {{-- Unblock --}}
                                                    <button type="submit"
                                                        onclick="return confirm('هل أنت متأكد من إلغاء حظر {{ $user->name }}؟')"
                                                        class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-medium text-green-700 bg-green-50 rounded-lg hover:bg-green-100 border border-green-200 hover:border-green-300 transition-all duration-200"
                                                        title="إلغاء الحظر">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                                                        </svg>
                                                        إلغاء الحظر
                                                    </button>
                                                @else
                                                    {{-- Block --}}
                                                    <button type="submit"
                                                        onclick="return confirm('هل أنت متأكد من حظر {{ $user->name }}؟')"
                                                        class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-medium text-red-700 bg-red-50 rounded-lg hover:bg-red-100 border border-red-200 hover:border-red-300 transition-all duration-200"
                                                        title="حظر المستخدم">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                                        </svg>
                                                        حظر
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="p-4 border-t border-gray-100">
                        {{ $users->links() }}
                    </div>
                </div>

            @else
                {{-- Empty State --}}
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">لا يوجد عملاء</h3>
                    <p class="text-gray-500 text-sm">لم يتم العثور على أي عملاء حتى الآن</p>
                </div>
            @endif

        </div>
    </div>

    {{-- Add Balance Modal (include separately) --}}
    {{-- @include('Dashboard.Modals.add-balance') --}}

    <script>
        function toggleEmail(btn) {
            const textEl = btn.querySelector('.email-text');
            const full = btn.dataset.full;
            const short = btn.dataset.short;
            textEl.textContent = textEl.textContent === short ? full : short;
        }
    </script>

@endsection
