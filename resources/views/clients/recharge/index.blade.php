@extends('clients.layouts.app')

@section('title', 'نقطة ويب سيرفر - شحن المحفظة')

@section('contain')

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 p-3 md:p-6">

        <div class="max-w-7xl mx-auto">

            {{-- Header Section --}}
            <div class="text-center mb-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">
                    شحن المحفظة
                </h1>
                <p class="text-gray-600 text-sm">اختر طريقة الدفع وأكمل عملية الإيداع بسهولة</p>
            </div>

            {{-- Tabs --}}
            <div class="flex gap-2 mb-6 justify-center">
                <button id="tab-request" onclick="switchTab('request')"
                    class="tab-btn px-6 py-2.5 rounded-xl font-bold text-xs transition-all duration-300
                                                                                                   bg-gradient-to-b from-teal-500 to-teal-600 text-white shadow-lg shadow-teal-200
                                                                                                   hover:shadow-xl hover:scale-105">
                    <i class="fa-solid fa-plus-circle ml-2"></i>
                    طلب تعبئة جديد
                </button>

                <button id="tab-history" onclick="switchTab('history')"
                    class="tab-btn px-6 py-2.5 rounded-xl font-bold text-xs transition-all duration-300
                                                                                                   bg-white text-gray-700 shadow-md hover:shadow-lg hover:scale-105">
                    <i class="fa-solid fa-clock-rotate-left ml-2"></i>
                    سجل التعبئة
                </button>
            </div>

            {{-- ================= TAB : REQUEST ================= --}}
            <div id="tab-request-content">

                <div class="max-w-5xl mx-auto space-y-5">

                    {{-- Payment Methods Cards --}}
                    <div class="mb-6">
                        <h2 class="text-lg font-bold text-gray-800 mb-3 text-center">
                            <i class="fa-solid fa-credit-card ml-2 text-teal-500"></i>
                            اختر طريقة الدفع المناسبة
                        </h2>

                        <div id="payment-methods-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                            @foreach ($data['depositMethods'] as $method)
                                <div class="payment-method-card cursor-pointer transition-all duration-300
                                                                                                                                                                                    bg-white rounded-xl p-4 border-2 border-gray-200
                                                                                                                                                                                    hover:border-teal-400 hover:shadow-xl hover:-translate-y-1 group"
                                    data-method-id="{{ $method->id }}" data-method-name="{{ $method->name }}"
                                    data-method-details="{{ $method->account_number }}"
                                    data-account-name="{{ $method->account_name }}" onclick="selectPaymentMethod(this)">

                                    <div class="flex items-start justify-between mb-3">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-gradient-to-br from-teal-100 to-cyan-100
                                                                                                                                                                                            flex items-center justify-center group-hover:scale-110 transition-transform">
                                            <i class="fa-solid fa-building-columns text-teal-600 text-lg"></i>
                                        </div>
                                        <div class="payment-method-check hidden">
                                            <i class="fa-solid fa-circle-check text-xl text-teal-500"></i>
                                        </div>
                                    </div>

                                    <h3 class="font-bold text-gray-800 text-base mb-1">{{ $method->name }}</h3>

                                    <div class="mt-3 pt-3 border-t border-gray-100">
                                        <div class="flex items-center justify-between text-xs">
                                            <span class="text-gray-500">متاح الآن</span>
                                            <span class="px-2 py-0.5 bg-green-100 text-green-700 rounded-full font-semibold">
                                                <i class="fa-solid fa-circle text-[6px] ml-1"></i>
                                                نشط
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Selected Method Info Card --}}
                    <div id="selected-method-info"
                        class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-5 shadow-2xl hidden
                                                                                                    transform transition-all duration-500">

                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-info-circle"></i>
                                معلومات التحويل
                            </h3>
                            <button onclick="clearMethodSelection()" class="text-white/80 hover:text-white transition">
                                <i class="fa-solid fa-times text-lg"></i>
                            </button>
                        </div>

                        <p class="text-white/90 text-xs mb-4">
                            قم بتحويل المبلغ إلى الحساب التالي، ثم أدخل بيانات المعاملة أدناه
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                            {{-- Method Name --}}
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 border border-white/20">
                                <p class="text-white/70 text-xs mb-1">طريقة الإيداع</p>
                                <div class="flex items-center justify-between gap-2">
                                    <p id="display-method-name" class="font-bold text-white text-sm">—</p>
                                    <button type="button" onclick="copyText('display-method-name')"
                                        class="px-2 py-1 text-xs rounded-lg bg-white/20 text-white
                                                                                                                       hover:bg-white/30 transition backdrop-blur-sm flex-shrink-0">
                                        <i class="fa-solid fa-copy ml-1"></i>
                                        نسخ
                                    </button>
                                </div>
                            </div>

                            {{-- Method Account Number --}}
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 border border-white/20">
                                <p class="text-white/70 text-xs mb-1">رقم الحساب</p>
                                <div class="flex items-center justify-between gap-2">
                                    <p id="display-method-account-number"
                                        class="font-mono font-semibold text-white text-xs break-all">—</p>
                                    <button type="button" onclick="copyText('display-method-account-number')"
                                        class="px-2 py-1 text-xs rounded-lg bg-white/20 text-white
                                                                                                                       hover:bg-white/30 transition backdrop-blur-sm flex-shrink-0">
                                        <i class="fa-solid fa-copy ml-1"></i>
                                        نسخ
                                    </button>
                                </div>
                            </div>

                            {{-- method account name --}}
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 border border-white/20">
                                <p class="text-white/70 text-xs mb-1">اسم الحساب</p>
                                <div class="flex items-center justify-between gap-2">
                                    <p id="display-method-account-name"
                                        class="font-mono font-semibold text-white text-xs break-all">—</p>
                                    <button type="button" onclick="copyText('display-method-account-name')"
                                        class="px-2 py-1 text-xs rounded-lg bg-white/20 text-white
                                                                                                                       hover:bg-white/30 transition backdrop-blur-sm flex-shrink-0">
                                        <i class="fa-solid fa-copy ml-1"></i>
                                        نسخ
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Limits --}}
                        <div
                            class="bg-yellow-400/20 backdrop-blur-sm border border-yellow-300/30
                                                                                                        text-yellow-100 rounded-lg px-3 py-2 text-xs">
                            <i class="fa-solid fa-triangle-exclamation ml-1"></i>
                            <b>الحد الأدنى:</b> ج.س 5000 <b>
                        </div>
                    </div>

                    {{-- Deposit Form --}}
                    <div id="deposit-form-container"
                        class="bg-white rounded-xl shadow-xl p-5 hidden transform transition-all duration-500">

                        <h3 class="text-lg font-bold text-gray-800 mb-4 text-center">
                            <i class="fa-solid fa-file-invoice-dollar ml-2 text-teal-500"></i>
                            أكمل بيانات الإيداع
                        </h3>

                        <form action="{{ route('clients.recharge.store') }}" method="POST" class="space-y-4">
                            @csrf

                            {{-- Hidden Method ID --}}
                            <input type="hidden" name="deposit_method_id" id="selected-method-id">

                            {{-- Amount --}}
                            <div class="space-y-1">
                                <label class="block text-gray-700 font-semibold text-xs">
                                    <i class="fa-solid fa-money-bill-wave ml-1 text-teal-500"></i>
                                    المبلغ
                                </label>
                                <div class="relative">
                                    <input type="number" name="amount" required min="500" step="0.01"
                                        class="w-full rounded-lg border-2 border-gray-200 px-3 py-3
                                                                                                                      focus:border-teal-400 focus:ring-4 focus:ring-teal-100
                                                                                                                      transition-all outline-none text-sm font-semibold"
                                        placeholder="أدخل المبلغ">
                                    <span
                                        class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs font-semibold">
                                        ج.س
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500">
                                    <i class="fa-solid fa-lightbulb ml-1"></i>
                                    الحد الأدنى للإيداع هو 5000 ج.س
                                </p>
                            </div>

                            {{-- Transaction Reference --}}
                            <div class="space-y-1">
                                <label class="block text-gray-700 font-semibold text-xs">
                                    <i class="fa-solid fa-hashtag ml-1 text-teal-500"></i>
                                    رقم العملية / المعاملة
                                </label>
                                <input type="text" name="transaction_reference" required
                                    class="w-full rounded-lg border-2 border-gray-200 px-3 py-3
                                                                                                                  focus:border-teal-400 focus:ring-4 focus:ring-teal-100
                                                                                                                  transition-all outline-none text-sm"
                                    placeholder="أدخل رقم التحويل أو المرجع">
                                <p class="text-xs text-gray-500">
                                    <i class="fa-solid fa-lightbulb ml-1"></i>
                                    أدخل الرقم المرجعي الذي حصلت عليه من عملية التحويل
                                </p>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit"
                                class="prevent-double-click w-full py-3 rounded-xl font-bold text-sm
                                                                                                               bg-gradient-to-b from-teal-500 to-teal-600 text-white
                                                                                                               shadow-lg shadow-teal-200 hover:shadow-xl
                                                                                                               hover:scale-[1.02] transition-all duration-300
                                                                                                               flex items-center justify-center gap-2">
                                <i class="fa-solid fa-paper-plane"></i>
                                إرسال طلب التعبئة
                            </button>

                        </form>
                    </div>

                </div>
            </div>

            {{-- ================= TAB : HISTORY ================= --}}
            <div id="tab-history-content" class="hidden">

                <div class="max-w-6xl mx-auto">

                    @if ($data['deposits']->count())

                        <div class="bg-white rounded-xl shadow-xl overflow-hidden">

                            <div class="bg-gradient-to-b from-teal-500 to-teal-600 px-4 py-3">
                                <h3 class="text-base font-bold text-white">
                                    <i class="fa-solid fa-list ml-2"></i>
                                    سجل عمليات الإيداع
                                </h3>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full text-xs">

                                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                                        <tr>
                                            <th class="px-4 py-3 text-right font-bold text-gray-700">#</th>
                                            <th class="px-4 py-3 text-right font-bold text-gray-700">الطريقة</th>
                                            <th class="px-4 py-3 text-right font-bold text-gray-700">المبلغ</th>
                                            <th class="px-4 py-3 text-right font-bold text-gray-700">رقم العملية</th>
                                            <th class="px-4 py-3 text-right font-bold text-gray-700">الحالة</th>
                                            <th class="px-4 py-3 text-right font-bold text-gray-700">التاريخ</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-100">
                                        @foreach ($data['deposits'] as $deposit)
                                            <tr class="hover:bg-gray-50 transition-colors">

                                                <td class="px-4 py-3 text-gray-600 font-semibold">
                                                    #{{ $deposit->id }}
                                                </td>

                                                <td class="px-4 py-3">
                                                    <div class="flex items-center gap-2">
                                                        <div
                                                            class="w-7 h-7 rounded-lg bg-teal-100 flex items-center justify-center">
                                                            <i class="fa-solid fa-building-columns text-teal-600 text-xs"></i>
                                                        </div>
                                                        <span class="font-semibold text-gray-800">
                                                            {{ $deposit->method->name }}
                                                        </span>
                                                    </div>
                                                </td>

                                                <td class="px-4 py-3">
                                                    <span class="font-bold text-sm text-gray-800">
                                                        {{ number_format($deposit->amount) }}
                                                    </span>
                                                    <span class="text-gray-500 text-xs mr-1">ج.س</span>
                                                </td>

                                                <td class="px-4 py-3">
                                                    <code class="px-2 py-1 bg-gray-100 rounded text-xs font-mono text-gray-700">
                                                                                                                                                                                                                                                                    {{ $deposit->transaction_reference }}
                                                                                                                                                                                                                                                                </code>
                                                </td>

                                                <td class="px-4 py-3">
                                                    @if($deposit->status === 'pending')
                                                        <span
                                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-full
                                                                                                                                                                                                                                                                                                                                                     bg-yellow-100 text-yellow-700 text-xs font-bold">
                                                            <i class="fa-solid fa-clock"></i>
                                                            قيد المراجعة
                                                        </span>
                                                    @elseif($deposit->status === 'approved')
                                                        <span
                                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-full
                                                                                                                                                                                                                                                                                                                                                     bg-green-100 text-green-700 text-xs font-bold">
                                                            <i class="fa-solid fa-circle-check"></i>
                                                            مقبول
                                                        </span>
                                                    @elseif($deposit->status === 'rejected')
                                                        <span
                                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-full
                                                                                                                                                                                                                                                                                                                                                     bg-red-100 text-red-700 text-xs font-bold">
                                                            <i class="fa-solid fa-circle-xmark"></i>
                                                            مرفوض
                                                        </span>
                                                    @endif
                                                </td>

                                                <td class="px-4 py-3 text-gray-600">
                                                    <i class="fa-solid fa-calendar ml-1 text-gray-400"></i>
                                                    {{ $deposit->created_at->format('Y-m-d') }}
                                                    <br>
                                                    <i class="fa-solid fa-clock ml-1 text-gray-400"></i>
                                                    {{ $deposit->created_at->format('H:i') }}
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @else
                        <div class="bg-white rounded-xl shadow-xl p-8 text-center">
                            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                                <i class="fa-solid fa-inbox text-3xl text-gray-300"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">لا يوجد سجل تعبئة</h3>
                            <p class="text-gray-500 text-sm">لم تقم بأي عمليات إيداع بعد</p>
                        </div>
                    @endif

                </div>
            </div>

        </div>

    </div>

    {{-- ================= JavaScript ================= --}}
    <script>
        let selectedMethodId = null;

        function switchTab(tab) {
            document.getElementById('tab-request-content').classList.add('hidden');
            document.getElementById('tab-history-content').classList.add('hidden');

            const tabs = ['tab-request', 'tab-history'];
            tabs.forEach(t => {
                const btn = document.getElementById(t);
                btn.classList.remove('bg-gradient-to-b', 'from-teal-500', 'to-teal-600', 'text-white', 'shadow-lg', 'shadow-teal-200');
                btn.classList.add('bg-white', 'text-gray-700', 'shadow-md');
            });

            document.getElementById(`tab-${tab}-content`).classList.remove('hidden');

            const activeBtn = document.getElementById(`tab-${tab}`);
            activeBtn.classList.remove('bg-white', 'text-gray-700', 'shadow-md');
            activeBtn.classList.add('bg-gradient-to-b', 'from-teal-500', 'to-teal-600', 'text-white', 'shadow-lg', 'shadow-teal-200');
        }

        function selectPaymentMethod(element) {
            document.querySelectorAll('.payment-method-card').forEach(card => {
                card.classList.remove('border-teal-500', 'bg-teal-50', 'shadow-xl', 'ring-4', 'ring-teal-100');
                card.classList.add('border-gray-200');
                card.querySelector('.payment-method-check').classList.add('hidden');
            });

            element.classList.remove('border-gray-200');
            element.classList.add('border-teal-500', 'bg-teal-50', 'shadow-xl', 'ring-4', 'ring-teal-100');
            element.querySelector('.payment-method-check').classList.remove('hidden');

            selectedMethodId = element.dataset.methodId;
            const methodName = element.dataset.methodName;
            const methodDetails = element.dataset.methodDetails;
            const methodAccountName = element.dataset.accountName;


            document.getElementById('display-method-name').textContent = methodName;
            document.getElementById('display-method-account-number').textContent = methodDetails;
            document.getElementById('display-method-account-name').textContent = methodAccountName;
            document.getElementById('selected-method-id').value = selectedMethodId;

            document.getElementById('selected-method-info').classList.remove('hidden');
            document.getElementById('deposit-form-container').classList.remove('hidden');

            setTimeout(() => {
                document.getElementById('selected-method-info').scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });
            }, 100);
        }

        function clearMethodSelection() {
            document.querySelectorAll('.payment-method-card').forEach(card => {
                card.classList.remove('border-teal-500', 'bg-teal-50', 'shadow-xl', 'ring-4', 'ring-teal-100');
                card.classList.add('border-gray-200');
                card.querySelector('.payment-method-check').classList.add('hidden');
            });

            document.getElementById('selected-method-info').classList.add('hidden');
            document.getElementById('deposit-form-container').classList.add('hidden');
            selectedMethodId = null;
        }

        function copyText(elementId) {
            const element = document.getElementById(elementId);
            const text = element.textContent.trim();

            navigator.clipboard.writeText(text).then(() => {
                const originalText = element.textContent;
                element.textContent = '✓ تم النسخ';

                setTimeout(() => {
                    element.textContent = originalText;
                }, 1500);
            }).catch(err => {
                console.error('Failed to copy:', err);
            });
        }
    </script>

@endsection