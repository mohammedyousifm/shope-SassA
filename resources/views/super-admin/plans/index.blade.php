@extends('super-admin.layouts.app')

@section('title', 'إدارة الباقات')

@section('contain')
    <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">


        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">إجمالي الباقات</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $plans->total() }}</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">الباقات المفعلة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $plans->where('is_active', 1)->count() }}</p>
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
                        <p class="text-xs text-gray-600">الباقات الموقوفة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $plans->where('is_active', 0)->count() }}</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-4 border-r-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600">الميزات المتاحة</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $features->count() }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add Plan Button --}}
        <div class="mt-6">
            <button onclick="openAddModal()"
                class="bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 font-bold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                إضافة باقة جديدة
            </button>
        </div>

        {{-- Plans Table --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mt-6 border border-gray-200">

            {{-- Table Header --}}
            <div class="bg-gradient-to-l from-purple-600 to-indigo-600 px-6 py-4">
                <h3 class="text-white font-bold text-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    قائمة الباقات
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-right">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>اسم الباقة</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>السعر</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="p-4 font-bold text-gray-700 text-xs">
                                <div class="flex items-center gap-2 justify-start">
                                    <span>المدة</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                        @forelse($plans as $plan)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4">
                                    <div class="flex items-center gap-3 justify-start">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-400 to-indigo-500 flex items-center justify-center text-white font-bold">
                                            {{ mb_substr($plan->name, 0, 1) }}
                                        </div>
                                        <span class="font-bold text-gray-900 text-sm">{{ $plan->name }}</span>
                                    </div>
                                </td>

                                <td class="p-4">
                                    <div
                                        class="inline-flex items-center gap-2 bg-green-50 text-green-700 px-3 py-2 rounded-lg font-bold text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ number_format($plan->price) }} ج.س
                                    </div>
                                </td>

                                <td class="p-4">
                                    <div
                                        class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-3 py-2 rounded-lg font-medium text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $plan->duration_days }} يوم
                                    </div>
                                </td>

                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg border
                                                                    {{ $plan->is_active ? 'bg-green-100 text-green-700 border-green-200' : 'bg-red-100 text-red-700 border-red-200' }}">
                                        @if($plan->is_active)
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
                                            موقوفة
                                        @endif
                                    </span>
                                </td>

                                <td class="p-4">
                                    <div class="flex gap-2 items-center justify-start">
                                        <button onclick="openEditModal({{ $plan->id }})"
                                            class="text-xs px-3 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white font-semibold transition-colors flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            تعديل
                                        </button>

                                        <button onclick="openDeleteModal({{ $plan->id }})"
                                            class="text-xs px-3 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white font-semibold transition-colors flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            حذف
                                        </button>

                                        <form method="POST" action="{{ route('superadmin.plans.toggle', $plan) }}">
                                            @csrf
                                            <button
                                                class="text-xs px-3 py-2 rounded-lg font-semibold transition-colors flex items-center gap-1
                                                                            {{ $plan->is_active ? 'bg-orange-500 hover:bg-orange-600 text-white' : 'bg-teal-500 hover:bg-teal-600 text-white' }}">
                                                @if($plan->is_active)
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    إيقاف
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
                                    </div>
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
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900">لا توجد باقات</h3>
                                            <p class="text-gray-500 mt-1">لم يتم إنشاء أي باقات حتى الآن</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                {{ $plans->links() }}
            </div>
        </div>

        {{-- Add Modal --}}
        <div id="addModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl max-h-[90vh] overflow-y-auto">
                <div class="bg-gradient-to-r from-teal-600 to-cyan-600 px-6 py-4 rounded-t-2xl">
                    <h2 class="text-xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        إضافة باقة جديدة
                    </h2>
                </div>

                <form method="POST" action="{{ route('superadmin.plans.store') }}" class="p-6">
                    @csrf

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">اسم الباقة</label>
                            <input name="name" required
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none"
                                placeholder="مثال: باقة المبتدئين">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">السعر (ج.س)</label>
                                <input name="price" type="number" required
                                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none"
                                    placeholder="0">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">المدة (يوم)</label>
                                <input name="duration_days" type="number" required
                                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none"
                                    placeholder="30">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">الميزات المتاحة</label>
                            <div
                                class="grid grid-cols-2 gap-3 max-h-60 overflow-y-auto p-2 border-2 border-gray-200 rounded-lg">
                                @foreach ($features as $feature)
                                    <label
                                        class="flex items-center gap-3 border border-gray-300 rounded-lg p-3 hover:bg-gray-50 cursor-pointer transition-colors">
                                        <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                            class="w-4 h-4 text-teal-600 rounded focus:ring-2 focus:ring-teal-500">
                                        <span class="text-sm text-gray-700">{{ $feature->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-start gap-3 mt-6 pt-6 border-t border-gray-200">
                        <button type="button" onclick="closeModals()"
                            class="px-6 py-2 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                            إلغاء
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white font-bold rounded-lg shadow-md transition-all">
                            حفظ الباقة
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Delete Modal --}}
        <div id="deleteModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl p-6 shadow-2xl max-w-md w-full">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 text-center mb-2">تأكيد الحذف</h3>
                <p class="text-gray-600 text-center mb-6">هل أنت متأكد من حذف هذه الباقة؟ لا يمكن التراجع عن هذا الإجراء.
                </p>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="flex gap-3">
                        <button type="button" onclick="closeModals()"
                            class="flex-1 px-4 py-2 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                            إلغاء
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-colors">
                            حذف نهائياً
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const addModal = document.getElementById('addModal');
        const deleteModal = document.getElementById('deleteModal');

        function openAddModal() {
            closeModals();
            addModal.classList.remove('hidden');
            addModal.classList.add('flex');
        }

        function openDeleteModal(planId) {
            closeModals();
            const form = document.getElementById('deleteForm');
            form.action = `/superadmin/plans/${planId}`;
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('flex');
        }

        function closeModals() {
            [addModal, deleteModal].forEach(m => {
                m.classList.add('hidden');
                m.classList.remove('flex');
            });
        }

        // Close modal on outside click
        [addModal, deleteModal].forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModals();
            });
        });
    </script>

@endsection