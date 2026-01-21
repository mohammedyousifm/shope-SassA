@extends('landing.layouts.app')

@section('contain')

    <section class="py-20 mt-10 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4">

            {{-- Header --}}
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-gray-900">
                    إتمام الاشتراك
                </h1>
                <p class="mt-3 text-gray-500">
                    اختر طريقة الدفع لإكمال اشتراكك
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- Plan Summary --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">
                        تفاصيل الباقة
                    </h2>

                    <div class="border rounded-xl p-4 text-center">
                        <h3 class="text-xl font-bold text-gray-900">
                            {{ $plan->name }}
                        </h3>

                        <p class="mt-2 text-gray-500 text-sm">
                            مدة الاشتراك: {{ $plan->duration_days }} يوم
                        </p>

                        <div class="my-4">
                            <span class="text-2xl font-bold text-teal-600">
                                {{ number_format($plan->price) }} ج.س
                            </span>
                        </div>

                        <span class="inline-block px-3 py-1 text-xs rounded-full bg-teal-100 text-teal-700">
                            اشتراك {{ $plan->duration_days }} يوم
                        </span>
                    </div>
                </div>

                {{-- Payment Section --}}
                <div class="md:col-span-2 bg-white rounded-2xl shadow p-6">

                    <form action="{{ route('merchant.platform.payment.store', $plan) }}" method="POST">
                        @csrf

                        <h2 class="text-lg font-semibold text-gray-800 mb-6">
                            طرق الدفع
                        </h2>

                        {{-- Payment Methods --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($methods as $method)
                                <div class="payment-method border rounded-xl p-4 cursor-pointer transition hover:border-teal-600"
                                    data-id="{{ $method->id }}" data-account-name="{{ $method->account_name }}"
                                    data-account-number="{{ $method->account_number }}">
                                    <span class="font-medium text-gray-800">
                                        {{ $method->bank_name }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        {{-- Hidden Inputs --}}
                        <input type="hidden" name="payment_method_id" id="paymentMethodInput">

                        {{-- Payment Details --}}
                        <div id="paymentDetails" class="hidden mt-8 border-t pt-6">
                            <h3 class="text-md font-semibold text-gray-800 mb-4">
                                تفاصيل الدفع
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-gray-600">اسم الحساب</label>
                                    <div class="font-medium text-gray-800" id="accountName"></div>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">رقم الحساب</label>
                                    <div class="font-medium text-gray-800" id="accountNumber"></div>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">المبلغ المطلوب</label>
                                    <div class="font-semibold text-teal-600 text-lg">
                                        {{ number_format($plan->price) }} ج.س
                                    </div>
                                </div>

                                <div>
                                    <label class="text-sm font-medium text-gray-700">
                                        رقم العملية (Transaction Reference)
                                    </label>
                                    <input type="text" name="transaction_reference" id="transactionRef"
                                        class="w-full mt-1 rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                        placeholder="مثال: TXN123456">
                                </div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="mt-8">
                            <button type="submit" id="submitBtn" disabled
                                class="w-full py-4 rounded-xl font-semibold text-white bg-gray-300 cursor-not-allowed transition">
                                تأكيد الاشتراك والمتابعة
                            </button>

                            <p class="text-xs text-gray-400 text-center mt-3">
                                سيتم تحويلك تلقائيًا بعد إتمام الدفع
                            </p>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>


    <script>
        const methods = document.querySelectorAll('.payment-method');
        const details = document.getElementById('paymentDetails');
        const accountName = document.getElementById('accountName');
        const accountNumber = document.getElementById('accountNumber');
        const transactionRef = document.getElementById('transactionRef');
        const submitBtn = document.getElementById('submitBtn');
        const paymentMethodInput = document.getElementById('paymentMethodInput');

        let selectedMethod = null;

        methods.forEach(method => {
            method.addEventListener('click', () => {

                // UI selection
                methods.forEach(m =>
                    m.classList.remove('border-teal-600', 'ring-2', 'ring-teal-500')
                );

                method.classList.add('border-teal-600', 'ring-2', 'ring-teal-500');

                // Set data
                accountName.textContent = method.dataset.accountName;
                accountNumber.textContent = method.dataset.accountNumber;
                paymentMethodInput.value = method.dataset.id;

                selectedMethod = method.dataset.id;
                details.classList.remove('hidden');

                validateForm();
            });
        });

        transactionRef.addEventListener('input', validateForm);

        function validateForm() {
            if (selectedMethod && transactionRef.value.trim() !== '') {
                submitBtn.disabled = false;
                submitBtn.classList.remove('bg-gray-300', 'cursor-not-allowed');
                submitBtn.classList.add('bg-teal-600', 'hover:bg-teal-700');
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.add('bg-gray-300', 'cursor-not-allowed');
                submitBtn.classList.remove('bg-teal-600', 'hover:bg-teal-700');
            }
        }
    </script>

@endsection