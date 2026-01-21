@extends('tenant.layouts.app')

@section('title', 'نقطة ويب سيرفر - إيداعات المستخدمين')

@section('contain')

    <div class="p-4">



        {{-- Tabs --}}
        <div class="flex gap-2 mb-6 text-xs">
            <button id="tab-deposits" onclick="switchTab('deposits')"
                class="tab-btn px-4 py-2 rounded-lg
                                                                                                                                                       bg-gradient-to-b from-teal-500 to-teal-600
                                                                                                                                                       text-white font-semibold">
                إيداعات المستخدمين
            </button>

            <button id="tab-methods" onclick="switchTab('methods')"
                class="tab-btn px-4 py-2 rounded-lg
                                                                                                                                                       bg-white text-teal-600 shadow font-semibold">
                طرق الدفع
            </button>
        </div>

        {{-- ================= TAB : DEPOSITS ================= --}}
        <div id="tab-deposits-content">

            <div class="bg-white rounded-xl shadow overflow-hidden">

                <form method="GET" action="{{ route('tenant.deposits') }}" class="flex flex-wrap gap-3 items-center mb-4">

                    {{-- Search (transaction_reference OR user name) --}}
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="بحث برقم العملية أو اسم العميل"
                        class="px-3 py-2 border rounded-lg text-sm focus:ring focus:ring-teal-200" />

                    {{-- Amount filter --}}
                    <input type="number" name="amount" value="{{ request('amount') }}" placeholder="المبلغ"
                        class="px-3 py-2 border rounded-lg text-sm w-40 focus:ring focus:ring-teal-200" />

                    {{-- Submit --}}
                    <button type="submit" class="px-4 py-2 bg-teal-600 text-white text-sm rounded-lg hover:bg-teal-700">
                        تصفية
                    </button>

                    {{-- Reset --}}
                    <a href="{{ route('tenant.deposits') }}"
                        class="px-4 py-2 bg-gray-100 text-sm rounded-lg hover:bg-gray-200">
                        إعادة ضبط
                    </a>

                </form>


                @if ($deposits->count())

                    <div class="overflow-x-auto">
                        <table class="min-w-[1100px] w-full text-sm text-right border rounded-lg">

                            {{-- Head --}}
                            <thead class="bg-gray-50 f-12 text-gray-600">
                                <tr>
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">اسم العميل</th>
                                    <th class="px-4 py-3">طريقة الإيداع</th>
                                    <th class="px-4 py-3">المبلغ</th>
                                    <th class="px-4 py-3">رقم العملية</th>
                                    <th class="px-4 py-3">الحالة</th>
                                    <th class="px-4 py-3 text-center">الإجراءات</th>
                                </tr>
                            </thead>

                            {{-- Body --}}
                            <tbody class="divide-y f-12">
                                @foreach ($deposits as $deposit)

                                                @php
                                                    $isFinal = in_array($deposit->status, ['approved', 'rejected']);
                                                @endphp

                                                <tr class="hover:bg-gray-50 transition">

                                                    {{-- ID --}}
                                                    <td class="px-4 py-3 text-gray-500">
                                                        {{ $deposit->id }}
                                                    </td>

                                                    {{-- User --}}
                                                    <td class="px-4 py-3 font-medium text-gray-800">
                                                        {{ $deposit->client->name ?? '' }}
                                                    </td>

                                                    {{-- Method --}}
                                                    <td class="px-4 py-3">
                                                        {{ $deposit->method->name ?? '' }}
                                                    </td>

                                                    {{-- Amount --}}
                                                    <td class="px-4 py-3 font-semibold text-gray-800">
                                                        {{ number_format($deposit->amount) }} ج.س
                                                    </td>

                                                    {{-- Reference --}}
                                                    <td class="px-4 py-3 text-gray-600">
                                                        {{ $deposit->transaction_reference }}
                                                    </td>

                                                    {{-- Status --}}
                                                    <td class="px-4 py-3">
                                                        <span
                                                            class="px-2 py-1 text-xs rounded
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    {{ $deposit->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    {{ $deposit->status === 'approved' ? 'bg-green-100 text-green-700' : '' }}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    {{ $deposit->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}">
                                                            {{ $deposit->status === 'pending' ? 'قيد المراجعة' : '' }}
                                                            {{ $deposit->status === 'approved' ? 'مقبول' : '' }}
                                                            {{ $deposit->status === 'rejected' ? 'مرفوض' : '' }}
                                                        </span>
                                                    </td>

                                                    {{-- Actions --}}
                                                    <td class="px-4 py-3 text-center space-x-2 space-x-reverse">

                                                        {{-- Accept --}}
                                                        <form action="{{ route('tenant.deposits.accept', $deposit) }}" method="POST"
                                                            class="inline">
                                                            @csrf
                                                            <button @disabled($deposit->status !== 'pending') class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-lg
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ $deposit->status !== 'pending'
                                    ? 'text-gray-400 bg-gray-100 cursor-not-allowed'
                                    : 'text-green-700 bg-green-100 hover:bg-green-200' }}">
                                                                قبول
                                                            </button>
                                                        </form>

                                                        {{-- Reject --}}
                                                        <form action="{{ route('tenant.deposits.reject', $deposit) }}" method="POST"
                                                            class="inline" onsubmit="return confirm('هل أنت متأكد من رفض الإيداع؟')">
                                                            @csrf
                                                            <button @disabled($deposit->status !== 'pending') class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-lg
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ $deposit->status !== 'pending'
                                    ? 'text-gray-400 bg-gray-100 cursor-not-allowed'
                                    : 'text-red-700 bg-red-100 hover:bg-red-200' }}">
                                                                رفض
                                                            </button>
                                                        </form>

                                                    </td>

                                                </tr>

                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-6">
                            {{ $deposits->links() }}
                        </div>
                    </div>

                @else
                    {{-- Empty --}}
                    <div class="text-center text-gray-400 py-12">
                        <svg class="w-14 h-14 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V4m0 16v-4" />
                        </svg>
                        <p class="text-lg">لا توجد طلبات إيداع حالياً</p>
                    </div>
                @endif

            </div>
        </div>

        {{-- ================= TAB : PAYMENT METHODS ================= --}}
        <div id="tab-methods-content" class="hidden">
            <div class="bg-white rounded-xl shadow overflow-hidden">

                <div
                    class="flex rounded-lg justify-between bg-gradient-to-b from-teal-500 to-teal-600
                                                                                                                                       px-4 py-3 text-white items-center">

                    <span class="f-12 font-semibold">طرق الإيداع</span>

                    <button type="button" onclick="openAddMethodModal()"
                        class="rounded-lg f-12 bg-gradient-to-b from-teal-800 to-teal-800
                                                                                                                                               px-4 py-2 text-white font-semibold hover:bg-teal-900 transition">
                        + إضافة طريقة
                    </button>
                </div>

                @if ($depositMethods->count())

                    <div class="overflow-x-auto">
                        <table class="min-w-[900px] w-full text-sm text-right border rounded-lg">

                            {{-- Head --}}
                            <thead class="bg-gray-50 f-12 text-gray-600">
                                <tr>
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">اسم الطريقة</th>
                                    <th class="px-4 py-3">اسم الحساب</th>
                                    <th class="px-4 py-3">رقم الحساب</th>
                                    <th class="px-4 py-3">الحالة</th>
                                    <th class="px-4 py-3 text-center">الإجراءات</th>
                                </tr>
                            </thead>

                            {{-- Body --}}
                            <tbody class="divide-y f-12">
                                @foreach ($depositMethods as $method)
                                    <tr class="hover:bg-gray-50 transition">

                                        {{-- ID --}}
                                        <td class="px-4 py-3 text-gray-500">
                                            {{ $method->id }}
                                        </td>

                                        {{-- Name --}}
                                        <td class="px-4 py-3 font-medium text-gray-800">
                                            {{ $method->name }}
                                        </td>

                                        {{-- Account Name --}}
                                        <td class="px-4 py-3">
                                            {{ $method->account_name ?? '—' }}
                                        </td>

                                        {{-- Account Number --}}
                                        <td class="px-4 py-3 font-mono text-gray-600">
                                            {{ $method->account_number ?? '—' }}
                                        </td>


                                        {{-- Status --}}
                                        <td class="px-4 py-3">
                                            <span
                                                class="px-2 py-1 text-xs rounded
                                                                                                                                                                                                                                                                                                                                                                                                                        {{ $method->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                                {{ $method->is_active ? 'مفعّلة' : 'معطّلة' }}
                                            </span>
                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-4 py-3 text-center space-x-2 space-x-reverse">
                                            <button type="button" onclick="openEditDepositMethodModal(this)"
                                                data-id="{{ $method->id }}" data-name="{{ $method->name }}"
                                                data-account-name="{{ $method->account_name }}"
                                                data-account-number="{{ $method->account_number }}"
                                                data-is-active="{{ $method->is_active ? 1 : 0 }}"
                                                class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-lg
                                                                                                                                                                                                                                                                                                                                                                                       text-blue-700 bg-blue-100 hover:bg-blue-200">
                                                تعديل
                                            </button>


                                            <form action="{{ route('tenant.deposit-methods.destroy', $method) }}" method="POST"
                                                class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه الطريقة؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-lg
                                                                                                                                                                                                                                                                                                                                                                                                                                text-red-700 bg-red-100 hover:bg-red-200">
                                                    حذف
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @else
                    {{-- Empty --}}
                    <div class="text-center text-gray-400 py-12">
                        <svg class="w-14 h-14 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <p class="text-lg">لا توجد طرق دفع حالياً</p>
                    </div>
                @endif

            </div>
        </div>

    </div>

    {{-- ================= JS ================= --}}
    <script>
        function switchTab(tab) {
            // Hide all content
            document.getElementById('tab-deposits-content').classList.add('hidden');
            document.getElementById('tab-methods-content').classList.add('hidden');

            // Reset tab buttons
            document.getElementById('tab-deposits').classList.remove('from-teal-500', 'to-teal-600', 'text-white');
            document.getElementById('tab-methods').classList.remove('from-teal-500', 'to-teal-600', 'text-white');

            document.getElementById('tab-deposits').classList.add('bg-white', 'text-teal-600', 'shadow');
            document.getElementById('tab-methods').classList.add('bg-white', 'text-teal-600', 'shadow');

            // Show selected content
            document.getElementById(`tab-${tab}-content`).classList.remove('hidden');

            // Style selected tab
            const activeBtn = document.getElementById(`tab-${tab}`);
            activeBtn.classList.remove('bg-white', 'text-teal-600', 'shadow');
            activeBtn.classList.add('bg-gradient-to-b', 'from-teal-500', 'to-teal-600', 'text-white');
        }
    </script>

    <div id="editDepositMethodModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

        <div class="bg-white rounded-xl w-full max-w-md p-6">
            <h3 class="text-lg font-bold mb-4 text-center">تعديل طريقة الإيداع</h3>

            <form method="POST" id="editDepositMethodForm">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="block text-sm mb-1">اسم الطريقة</label>
                    <input type="text" name="name" id="edit-name" class="w-full border rounded-lg px-3 py-2">
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">اسم الحساب</label>
                    <input type="text" name="account_name" id="edit-account-name"
                        class="w-full border rounded-lg px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">رقم الحساب</label>
                    <input type="text" name="account_number" id="edit-account-number"
                        class="w-full border rounded-lg px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="inline-flex items-center gap-2 text-sm">
                        <input type="checkbox" name="is_active" id="edit-is-active" class="rounded border-gray-300">
                        <span>مفعّلة</span>
                    </label>
                </div>


                <div class="flex justify-between gap-2">
                    <button type="button" onclick="closeEditDepositMethodModal()" class="px-4 py-2 rounded-lg bg-gray-100">
                        إلغاء
                    </button>

                    <button type="submit" class="px-4 py-2 rounded-lg bg-blue-600 text-white">
                        حفظ التعديلات
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditDepositMethodModal(button) {
            const modal = document.getElementById('editDepositMethodModal');
            const form = document.getElementById('editDepositMethodForm');

            form.action = `/dashboard/methods/update/${button.dataset.id}`;

            document.getElementById('edit-name').value = button.dataset.name;
            document.getElementById('edit-account-name').value = button.dataset.accountName;
            document.getElementById('edit-account-number').value = button.dataset.accountNumber;

            document.getElementById('edit-is-active').checked = button.dataset.isActive == 1;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditDepositMethodModal() {
            const modal = document.getElementById('editDepositMethodModal');

            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>



    @include('tenant.modals.add-method')
@endsection