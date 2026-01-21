@extends('clients.auth.app')

@section('contain')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 px-4" dir="rtl">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8 relative">

            <h1 class="text-3xl font-bold text-center text-gray-900 mt-4">
                تسجيل الدخول
            </h1>

            <p class="text-gray-500 text-center mt-2 mb-8">
                ادخل إلى لوحة التحكم الخاصة بمتجرك
            </p>

            @include('components.alerts')

            <form method="POST" action="{{ route('clients.login.store') }}" class="space-y-4">
                @csrf


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
                            class="w-full rounded-xl border border-gray-300 pr-10 pl-3 py-1 text-gray-800 focus:ring-2 focus:ring-teal-500 focus:outline-none">
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
                        <input type="password" name="password" required
                            class="w-full rounded-xl border border-gray-200 pr-10 pl-3 py-1 text-gray-800 focus:ring-2 focus:ring-teal-500 focus:outline-none">
                    </div>

                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex  justify-between text-sm">

                    <a href="" class="text-teal-600 hover:underline font-medium">
                        نسيت كلمة المرور؟
                    </a>
                </div>

                <button type="submit"
                    class="w-full mt-4 bg-teal-600 hover:bg-teal-700 text-white py-1 rounded-xl font-semibold transition shadow-md">
                    تسجيل الدخول
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                ليس لديك حساب؟
                <a href="{{ route('clients.register') }}" class="text-teal-600 hover:underline font-medium">
                    إنشاء حساب جديد
                </a>
            </p>
        </div>
    </div>
@endsection