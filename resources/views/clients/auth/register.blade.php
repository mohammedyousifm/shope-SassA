@extends('clients.auth.app')

@section('contain')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 px-4 py-8"
        dir="rtl">
        <div class="w-full max-w-md">

            {{-- Header Logo/Icon --}}
            <div class="text-center mb-6">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

                {{-- Title --}}
                <div class="text-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-900">
                        إنشاء حساب جديد
                    </h2>
                    <p class="text-sm text-gray-600 mt-2">
                        أنشئ حسابك وابدأ باستخدام المنصة
                    </p>
                </div>

                <form id="registerForm" method="POST" action="{{ route('clients.register.store') }}" class="space-y-4">
                    @csrf

                    {{-- Full Name --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            اسم المستخدم
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                                class="w-full rounded-xl border-2 border-gray-300 pr-11 pl-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all"
                                placeholder="أدخل اسمك الكامل">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            البريد الإلكتروني
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" required
                                class="w-full rounded-xl border-2 border-gray-300 pr-11 pl-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all"
                                placeholder="example@domain.com">
                        </div>

                        <button type="button" id="sendCodeBtn"
                            class="mt-3 w-full bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white font-semibold py-2.5 rounded-lg transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            إرسال رمز التحقق
                        </button>

                        <p id="emailMsg" class="text-sm mt-2 font-medium"></p>
                    </div>

                    {{-- Verification Code --}}
                    <div id="codeBox" class="hidden">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                رمز التحقق (4 أرقام)
                            </span>
                        </label>
                        <input type="text" id="code" maxlength="4" inputmode="numeric"
                            class="w-full text-center text-2xl tracking-[1em] font-bold rounded-xl border-2 border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all"
                            placeholder="○ ○ ○ ○">
                    </div>

                    {{-- Password (hidden until verified) --}}
                    <div id="passwordBox" class="hidden">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            كلمة المرور
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input type="password" name="password"
                                class="w-full rounded-xl border-2 border-gray-300 pr-11 pl-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all"
                                placeholder="أدخل كلمة مرور قوية">
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button id="submitBtn" type="submit"
                        class="hidden w-full bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        إنشاء الحساب
                    </button>
                </form>

                {{-- Login Link --}}
                <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                    <p class="text-sm text-gray-600">
                        لديك حساب بالفعل؟
                        <a href="{{ route('clients.login') }}"
                            class="text-teal-600 hover:text-teal-700 font-bold underline-offset-4 hover:underline transition-colors">
                            تسجيل الدخول
                        </a>
                    </p>
                </div>
            </div>

            {{-- Footer --}}
            <div class="mt-6 text-center">
                <div class="flex items-center justify-center gap-4 text-xs text-gray-500 mb-2">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        آمن ومشفر
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        تسجيل سريع
                    </span>
                </div>
                <p class="text-xs text-gray-400">
                    © {{ date('Y') }} جميع الحقوق محفوظة
                </p>
            </div>

        </div>

        <script>
            const sendBtn = document.getElementById('sendCodeBtn');
            const emailInput = document.getElementById('email');
            const codeBox = document.getElementById('codeBox');
            const codeInput = document.getElementById('code');
            const passwordBox = document.getElementById('passwordBox');
            const submitBtn = document.getElementById('submitBtn');
            const msg = document.getElementById('emailMsg');

            sendBtn.onclick = async () => {
                if (!emailInput.value) {
                    msg.textContent = '⚠️ الرجاء إدخال البريد الإلكتروني';
                    msg.className = 'text-orange-600 text-sm mt-2 font-medium';
                    return;
                }

                sendBtn.disabled = true;
                sendBtn.innerHTML = `
                                                <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                                جاري الإرسال...
                                            `;
                msg.textContent = 'جاري إرسال رمز التحقق...';
                msg.className = 'text-blue-600 text-sm mt-2 font-medium';

                try {
                    const res = await fetch('{{ route("clients.verify.send") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ email: emailInput.value })
                    });

                    if (res.ok) {
                        msg.innerHTML = '✅ تم إرسال رمز التحقق إلى بريدك الإلكتروني';
                        msg.className = 'text-green-600 text-sm mt-2 font-medium';
                        codeBox.classList.remove('hidden');
                        emailInput.readOnly = true;
                        emailInput.classList.add('bg-gray-100', 'cursor-not-allowed');

                        sendBtn.innerHTML = `
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                        تم الإرسال
                                                    `;
                    } else {
                        msg.innerHTML = '❌ فشل إرسال رمز التحقق، حاول مرة أخرى';
                        msg.className = 'text-red-600 text-sm mt-2 font-medium';
                        sendBtn.disabled = false;
                        sendBtn.innerHTML = `
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                        </svg>
                                                        إعادة إرسال الرمز
                                                    `;
                    }
                } catch (error) {
                    msg.innerHTML = '❌ حدث خطأ، تحقق من الاتصال بالإنترنت';
                    msg.className = 'text-red-600 text-sm mt-2 font-medium';
                    sendBtn.disabled = false;
                    sendBtn.innerHTML = `
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                    </svg>
                                                    إعادة إرسال الرمز
                                                `;
                }
            };

            // Only allow numbers in code input
            codeInput.oninput = async (e) => {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');

                if (codeInput.value.length !== 4) return;

                try {
                    const res = await fetch('{{ route("clients.verify.check") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            email: emailInput.value,
                            code: codeInput.value
                        })
                    });

                    if (res.ok) {
                        passwordBox.classList.remove('hidden');
                        submitBtn.classList.remove('hidden');
                        codeInput.disabled = true;
                        codeInput.classList.add('bg-green-50', 'border-green-500', 'text-green-700');
                        msg.innerHTML = '✅ تم التحقق من البريد الإلكتروني بنجاح';
                        msg.className = 'text-green-600 text-sm mt-2 font-medium';
                    } else {
                        msg.innerHTML = '❌ رمز التحقق غير صحيح';
                        msg.className = 'text-red-600 text-sm mt-2 font-medium';
                        codeInput.value = '';
                        codeInput.focus();
                    }
                } catch (error) {
                    msg.innerHTML = '❌ حدث خطأ في التحقق';
                    msg.className = 'text-red-600 text-sm mt-2 font-medium';
                }
            };
        </script>
    </div>
@endsection