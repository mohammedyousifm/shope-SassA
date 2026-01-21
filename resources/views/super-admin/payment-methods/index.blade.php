@extends('super-admin.layouts.app')

@section('title', 'طرق الدفع')

@section('contain')
    <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">إجمالي الطرق</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $methods->count() }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">الطرق المفعلة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $methods->where('is_active', 1)->count() }}</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-red-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">الطرق المعطلة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $methods->where('is_active', 0)->count() }}</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">طرق بنكية</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $methods->whereNotNull('bank_name')->count() }}
                        </p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add Button --}}
        <div class="mt-6">
            <button onclick="openAddModal()"
                class="bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 font-bold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                إضافة طريقة دفع جديدة
            </button>
        </div>

        {{-- Payment Methods Table --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mt-6 border border-gray-200">

            {{-- Table Header --}}
            <div class="bg-gradient-to-l from-blue-600 to-indigo-600 px-6 py-4">
                <h3 class="text-white font-bold text-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    قائمة طرق الدفع
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-right">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>اسم الطريقة</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>البنك</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>اسم الحساب</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>رقم الحساب</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>الحالة</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>الإجراءات</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse ($methods as $method)
                            <tr class="hover:bg-gray-50 transition-colors">

                                <td class="p-4 text-xs">
                                    <div class="flex items-center gap-2 justify-start">
                                        <span class="font-bold text-gray-900">#{{ $method->id }}</span>
                                    </div>
                                </td>

                                <td class="p-4">
                                    <div class="flex items-center gap-3 justify-start">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white font-bold">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>
                                        <span class="font-bold text-gray-900 text-sm">{{ $method->method_name }}</span>
                                    </div>
                                </td>

                                <td class="p-4">
                                    @if($method->bank_name)
                                        <div
                                            class="inline-flex items-center gap-2 bg-purple-50 text-purple-700 px-3 py-2 rounded-lg text-xs font-medium">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                            </svg>
                                            {{ $method->bank_name }}
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-xs">—</span>
                                    @endif
                                </td>

                                <td class="p-4 text-xs text-gray-700">
                                    {{ $method->account_name ?? '—' }}
                                </td>

                                <td class="p-4">
                                    @if($method->account_number)
                                        <code class="bg-gray-100 px-2 py-1 rounded text-xs font-mono text-gray-700">
                                                                                    {{ $method->account_number }}
                                                                                </code>
                                    @else
                                        <span class="text-gray-400 text-xs">—</span>
                                    @endif
                                </td>

                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg border
                                                                {{ $method->is_active ? 'bg-green-100 text-green-700 border-green-200' : 'bg-red-100 text-red-700 border-red-200' }}">
                                        @if($method->is_active)
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            مفعلة
                                        @else
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            معطلة
                                        @endif
                                    </span>
                                </td>

                                <td class="p-4">
                                    <form method="POST" action="{{ route('superadmin.payment-methods.toggle', $method) }}">
                                        @csrf
                                        <button type="submit"
                                            class="text-xs px-4 py-2 rounded-lg font-semibold transition-colors flex items-center gap-1
                                                                    {{ $method->is_active ? 'bg-orange-500 hover:bg-orange-600 text-white' : 'bg-teal-500 hover:bg-teal-600 text-white' }}">
                                            @if($method->is_active)
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                تعطيل
                                            @else
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                تفعيل
                                            @endif
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900">لا توجد طرق دفع</h3>
                                            <p class="text-gray-500 mt-1">لم يتم إضافة أي طرق دفع حتى الآن</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Add Payment Method Modal --}}
        <div id="addModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl">
                <div class="bg-gradient-to-r from-teal-600 to-cyan-600 px-6 py-4 rounded-t-2xl">
                    <h2 class="text-xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        إضافة طريقة دفع جديدة
                    </h2>
                </div>

                <form method="POST" action="{{ route('superadmin.payment-methods.store') }}" class="p-6">
                    @csrf

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                اسم طريقة الدفع <span class="text-red-500">*</span>
                            </label>
                            <input name="method_name" required placeholder="مثال: تحويل بنكي، فودافون كاش"
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">اسم البنك</label>
                                <input name="bank_name" placeholder="مثال: البنك الأهلي"
                                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">اسم صاحب الحساب</label>
                                <input name="account_name" placeholder="مثال: محمد أحمد"
                                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">رقم الحساب</label>
                            <input name="account_number" placeholder="مثال: 1234567890"
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none font-mono">
                        </div>
                    </div>

                    <div class="flex justify-start gap-3 mt-6 pt-6 border-t border-gray-200">
                        <button type="button" onclick="closeModal()"
                            class="px-6 py-2.5 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                            إلغاء
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white font-bold rounded-lg shadow-md transition-all">
                            حفظ طريقة الدفع
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        const addModal = document.getElementById('addModal');

        function openAddModal() {
            addModal.classList.remove('hidden');
            addModal.classList.add('flex');
        }

        function closeModal() {
            addModal.classList.add('hidden');
            addModal.classList.remove('flex');
        }

        // Close modal on outside click
        addModal.addEventListener('click', (e) => {
            if (e.target === addModal) closeModal();
        });

        // Close modal on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });
    </script>

@endsection