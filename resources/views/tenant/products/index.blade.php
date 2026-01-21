@extends('tenant.layouts.app')

@section('title', 'إدارة المنتجات')

@section('contain')
    <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        {{-- Header --}}
         <x-page-header title="إدارة المنتجات"
            description="إدارة الألعاب والباقات، والتحكم الكامل في المحتوى والتوفر والأسعار" />

        {{-- Games Table --}}
        <div class="bg-white rounded-xl shadow-lg mt-6 overflow-hidden border border-gray-200">

            {{-- Table Header --}}
            <div class="bg-gradient-to-l from-teal-600 to-cyan-600 px-6 py-4 flex items-center justify-between">
                <h3 class="text-white font-bold text-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    قائمة الألعاب
                </h3>

                <button type="button" onclick="document.getElementById('addGameModal').classList.remove('hidden')"
                    class="bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white font-bold px-5 py-2.5 rounded-lg transition-all border border-white/30 flex items-center gap-2 shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    إضافة لعبة جديدة
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">

                    {{-- TABLE HEADER --}}
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr class="text-right">
                            <th class="px-6 py-4 font-bold text-gray-700 text-xs">#</th>
                            <th class="px-6 py-4 font-bold text-gray-700 text-xs">اسم اللعبة</th>
                            <th class="px-6 py-4 font-bold text-gray-700 text-xs">الحالة</th>
                            <th class="px-6 py-4 font-bold text-gray-700 text-xs text-center">الإجراءات</th>
                        </tr>
                    </thead>

                    {{-- TABLE BODY --}}
                    <tbody class="divide-y divide-gray-200">

                        @forelse ($games as $game)

                            {{-- GAME ROW --}}
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-xs">
                                    <div class="flex items-center gap-2 justify-end">
                                        <span class="font-bold text-gray-900">#{{ $game->id }}</span>
                                        <div class="w-2 h-2 rounded-full bg-teal-500"></div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 justify-end">
                                                <span class="font-bold text-gray-900 text-sm">{{ $game->name }}</span>
                                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-teal-100 to-cyan-100 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="togglePackages({{ $game->id }}, this)"
                                            class="toggle-btn w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 hover:bg-teal-100 text-gray-600 hover:text-teal-600 transition-all">
                                            <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    @if ($game->is_active)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-green-100 text-green-700 border border-green-200">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            نشطة
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-red-100 text-red-700 border border-red-200">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                            </svg>
                                            غير نشطة
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <form method="POST" action="" class="inline-block">
                                        @csrf
                                        @method('PATCH')

                                        @if ($game->is_active)
                                            <button class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-semibold text-red-700 bg-red-100 rounded-lg hover:bg-red-200 transition-all border border-red-200">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                                </svg>
                                                تعطيل
                                            </button>
                                        @else
                                            <button class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-semibold text-green-700 bg-green-100 rounded-lg hover:bg-green-200 transition-all border border-green-200">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                تفعيل
                                            </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>

                            {{-- PACKAGES ROW --}}
                            <tr id="packages-{{ $game->id }}" class="hidden bg-gradient-to-br from-gray-50 to-gray-100">
                                <td colspan="4" class="px-6 py-6">
                                    <div class="bg-white rounded-xl border-2 border-gray-200 overflow-hidden shadow-sm">
                                        <div class="bg-gradient-to-l from-purple-600 to-indigo-600 px-5 py-3 flex items-center justify-between">
                                            <h4 class="text-white font-bold text-sm flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                                </svg>
                                                باقات {{ $game->name }}
                                            </h4>
                                            <button type="button" onclick="openAddPackageModal({{ $game->id }})"
                                                class="bg-white/20 hover:bg-white/30 text-white text-xs font-bold px-4 py-2 rounded-lg transition-all border border-white/30 flex items-center gap-1.5">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                                إضافة باقة
                                            </button>
                                        </div>

                                        @if ($game->packages->count())
                                            <div class="overflow-x-auto">
                                                <table class="w-full text-sm">
                                                    <thead class="bg-gray-50 text-xs text-gray-600">
                                                        <tr class="text-right">
                                                            <th class="px-4 py-3">#</th>
                                                            <th class="px-4 py-3">اسم الباقة</th>
                                                            <th class="px-4 py-3">السعر</th>
                                                            <th class="px-4 py-3">الحالة</th>
                                                            <th class="px-4 py-3 text-center">الإجراءات</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="divide-y text-xs">
                                                        @foreach ($game->packages as $package)
                                                            <tr class="hover:bg-gray-50">
                                                                <td class="px-4 py-3 font-bold text-gray-900">#{{ $package->id }}</td>
                                                                <td class="px-4 py-3 font-semibold text-gray-900">{{ $package->name }}</td>
                                                                <td class="px-4 py-3">
                                                                    <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 px-2 py-1 rounded-lg font-bold">
                                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                                        </svg>
                                                                        {{ number_format($package->price) }} ج.س
                                                                    </span>
                                                                </td>

                                                                <td class="px-4 py-3">
                                                                    @if ($package->is_active)
                                                                        <span class="px-2 py-1 text-xs rounded-lg bg-green-100 text-green-700 font-semibold">نشطة</span>
                                                                    @else
                                                                        <span class="px-2 py-1 text-xs rounded-lg bg-red-100 text-red-700 font-semibold">غير نشطة</span>
                                                                    @endif
                                                                </td>

                                                                <td class="px-4 py-3 text-center space-x-2 space-x-reverse">
                                                                    <form method="POST" action="" class="inline-block">
                                                                        @csrf
                                                                        @method('PATCH')

                                                                        @if ($package->is_active)
                                                                            <button class="text-xs px-3 py-1.5 font-semibold text-red-700 bg-red-100 rounded-lg hover:bg-red-200">تعطيل</button>
                                                                        @else
                                                                            <button class="text-xs px-3 py-1.5 font-semibold text-green-700 bg-green-100 rounded-lg hover:bg-green-200">تفعيل</button>
                                                                        @endif
                                                                    </form>

                                                                    <button type="button" onclick='openEditPackagesModal(@json($package))'
                                                                        class="px-4 py-2 text-xs bg-gradient-to-r from-purple-500 to-indigo-500 hover:from-purple-600 hover:to-indigo-600 text-white rounded-lg font-semibold transition-all">
                                                                        تعديل
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="p-8 text-center">
                                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                                </svg>
                                                <p class="text-sm text-gray-500 font-medium">لا توجد باقات لهذه اللعبة</p>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="4" class="p-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900">لا توجد ألعاب</h3>
                                            <p class="text-gray-500 mt-1 text-sm">لم يتم إضافة أي ألعاب حتى الآن</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    {{-- Modals --}}
    @include('tenant.modals.add-game')
    @include('tenant.modals.add-package')
    @include('tenant.modals.edit-package')

    <script>
        function togglePackages(gameId, button) {
            const row = document.getElementById('packages-' + gameId);
            const icon = button.querySelector('svg');

            row.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    </script>
@endsection
