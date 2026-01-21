@extends('tenant.auth.app')

@section('contain')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 px-4" dir="rtl">
        <div class="w-full max-w-md">

            <div class="bg-white rounded-3xl shadow-xl p-8">

                {{-- Logo / Badge --}}
                <div class="flex justify-center mb-6">
                    <div
                        class="flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-b from-teal-500 to-teal-600  text-white text-2xl shadow-md">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </div>

                {{-- Title --}}
                <h2 class="text-center text-2xl font-bold text-gray-800">
                    إنشاء حساب جديد
                </h2>
                <p class="text-center text-sm text-gray-500 mt-1">
                    أنشئ حسابك وابدأ باستخدام المنصة
                </p>

                <form method="POST" action="{{ route('tenant.clients.register.store') }}" class="mt-6 space-y-5">
                    @csrf

                    {{-- Full Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            الاسم
                        </label>

                        <div class="relative">
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                                class="w-full rounded-xl border border-gray-300 pr-10 pl-3 py-2 text-gray-800
                                                                                                                                                                       focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            رقم الهاتف
                        </label>

                        <div class="relative">
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required
                                class="w-full rounded-xl border border-gray-300 pr-10 pl-3 py-2 text-gray-800
                                                                                                                                                                       focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>

                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            البريد الإلكتروني
                        </label>

                        <div class="relative">
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                                class="w-full rounded-xl border border-gray-300 pr-10 pl-3 py-2 text-gray-800
                                                                                                                                                                       focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>

                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            كلمة المرور
                        </label>

                        <div class="relative">
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-key"></i>
                            </span>
                            <input type="password" name="password" required autocomplete="new-password"
                                class="w-full rounded-xl border border-gray-300 pr-10 pl-3 py-2 text-gray-800
                                                                                                                                                                       focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>

                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                        class="prevent-double-click w-full rounded-xl bg-gradient-to-b from-teal-500 to-teal-600 hover:opacity-90 transition">
                        إنشاء الحساب
                    </button>

                    {{-- Login Link --}}
                    <p class="text-center text-sm text-gray-600">
                        لديك حساب بالفعل؟
                        <a href="{{ route('tenant.clients.login') }}" class="text-indigo-600 hover:underline font-medium">
                            تسجيل الدخول
                        </a>
                    </p>

                </form>

            </div>

            {{-- Footer --}}
            <p class="text-center text-xs text-gray-400 mt-6">
                © {{ date('Y') }} جميع الحقوق محفوظة
            </p>

        </div>
    </div>
@endsection