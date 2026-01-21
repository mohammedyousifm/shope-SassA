@extends('tenant.layouts.app')

@section('title', 'إدارة المنتجات')

@section('contain')
    <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        {{-- Header --}}
        <x-page-header title="إدارة المنتجات"
            description="إدارة الألعاب والباقات، والتحكم الكامل في المحتوى والتوفر والأسعار" />

        {{-- Card --}}
        <div class="bg-white mt-3 rounded-xl shadow-sm border border-gray-100 overflow-hidden">

            {{-- Header with Add Button --}}
            <div
                class="flex rounded-t-xl justify-between bg-gradient-to-l from-teal-500 to-teal-600 px-6 py-4 text-white items-center">
                <h2 class="text-lg font-semibold">إدارة الأكواد</h2>
                <button type="button" onclick="openAddcodeModal()"
                    class="rounded-lg text-sm bg-white/20 backdrop-blur-sm px-5 py-2.5 text-white font-semibold hover:bg-white/30 transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    إضافة كود
                </button>
            </div>

            <div class="p-6">
                {{-- Filter Form --}}
                <form method="GET" action="{{ route('tenant.code.products') }}"
                    class="flex flex-wrap gap-3 items-center mb-6">

                    {{-- Status Filter --}}
                    <div class="flex-1 min-w-[200px]">
                        <select name="is_used"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all">
                            <option value="">كل الحالات</option>
                            <option value="0" {{ request('is_used') === '0' ? 'selected' : '' }}>غير مستخدم</option>
                            <option value="1" {{ request('is_used') === '1' ? 'selected' : '' }}>مستخدم</option>
                        </select>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex gap-2">
                        <button type="submit"
                            class="px-5 py-2.5 bg-teal-600 text-white text-sm font-medium rounded-lg hover:bg-teal-700 transition-all duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            تصفية
                        </button>

                        <a href="{{ route('tenant.code.products') }}"
                            class="px-5 py-2.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-all duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            إعادة ضبط
                        </a>
                    </div>
                </form>

                @if ($code->count())
                    {{-- Responsive Table --}}
                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-[900px] w-full text-sm text-right">
                            <thead class="bg-gradient-to-l from-gray-50 to-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">#</th>
                                    <th class="px-4 py-3 font-semibold">اسم اللعبة</th>
                                    <th class="px-4 py-3 font-semibold">قيمة البطاقة</th>
                                    <th class="px-4 py-3 font-semibold">الكود</th>
                                    <th class="px-4 py-3 font-semibold">الحالة</th>
                                    <th class="px-4 py-3 font-semibold">مستخدم بواسطة</th>
                                    <th class="px-4 py-3 text-center font-semibold">الإجراءات</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($code as $card)
                                    <tr class="hover:bg-teal-50/50 transition-colors duration-150">
                                        <td class="px-4 py-4 text-gray-600">{{ $card->id }}</td>

                                        <td class="px-4 py-4 font-medium text-gray-900">
                                            {{ $card->giftCard->game->name }}
                                        </td>

                                        <td class="px-4 py-4 text-gray-700 font-semibold">
                                            {{ $card->giftCard->value  }}$
                                        </td>

                                        <td class="px-4 py-4">
                                            <button type="button"
                                                class="group cursor-pointer select-none font-mono text-sm bg-gray-100 hover:bg-teal-100 px-3 py-1.5 rounded-md transition-all duration-200 flex items-center gap-2"
                                                onclick="toggleCode(this)" data-full="{{ $card->code }}"
                                                data-short="{{ str_repeat('•', max(strlen($card->code) - 2, 0)) . substr($card->code, -2) }}">
                                                <span
                                                    class="code-text">{{ str_repeat('•', max(strlen($card->code) - 2, 0)) . substr($card->code, -2) }}</span>
                                                <svg class="w-4 h-4 text-gray-400 group-hover:text-teal-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </td>

                                        <td class="px-4 py-4">
                                            @if ($card->is_used)
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700 border border-emerald-200">
                                                    <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    تم الاستخدام
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-700 border border-amber-200">
                                                    <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    لم يستخدم
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-4 py-4">
                                            @if ($card->usedBy)
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700 border border-blue-200">
                                                    <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ $card->usedBy->name }}
                                                </span>
                                            @else
                                                <span class="text-gray-400 text-xs">—</span>
                                            @endif
                                        </td>

                                        <td class="px-4 py-4 text-center">
                                            @if ($card->is_used)
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-medium text-gray-500 bg-gray-100 rounded-lg cursor-not-allowed">
                                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    مستخدم
                                                </span>
                                            @else
                                                <form method="POST" action="{{ route('tenant.code.products.destroy', $card) }}"
                                                    class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الكود؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-medium text-red-700 bg-red-50 rounded-lg hover:bg-red-100 border border-red-200 hover:border-red-300 transition-all duration-200">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        حذف
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-6">
                        {{ $code->links() }}
                    </div>

                @else
                    {{-- Empty State --}}
                    <div class="text-center py-16">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-1">لا توجد بطاقات</h3>
                        <p class="text-gray-500 text-sm">ابدأ بإضافة أكواد جديدة من الزر أعلاه</p>
                    </div>
                @endif
            </div>
        </div>


    </div>

    @include('tenant.modals.add-code')
@endsection