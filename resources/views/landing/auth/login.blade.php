@extends('landing.auth.app')

@section('contain')
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8 relative">

        <!-- Badge -->
        <div class="absolute -top-4 right-1/2 translate-x-1/2 bg-teal-100 text-teal-700 text-sm px-4 py-1 rounded-full">
            مرحبًا بعودتك
        </div>

        <h1 class="text-3xl font-bold text-center text-gray-900 mt-4">
            تسجيل الدخول
        </h1>

        <p class="text-gray-500 text-center mt-2 mb-8">
            ادخل إلى لوحة التحكم الخاصة بمتجرك
        </p>
        @include('components.alerts')
        <form method="POST" action="{{ route('merchant.login.store') }}" class="space-y-4">
            @csrf

            <div>
                <input type="email" name="email" placeholder="البريد الإلكتروني"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                    required autofocus>
            </div>

            <div>
                <input type="password" name="password" placeholder="كلمة المرور"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                    required>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-600">
                    <input type="checkbox" name="remember"
                        class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                    تذكرني
                </label>

                <a href="" class="text-teal-600 hover:underline font-medium">
                    نسيت كلمة المرور؟
                </a>
            </div>

            <button type="submit"
                class="w-full mt-4 bg-teal-600 hover:bg-teal-700 text-white py-3 rounded-xl font-semibold transition shadow-md">
                تسجيل الدخول
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            ليس لديك حساب؟
            <a href="{{ route('merchant.register') }}" class="text-teal-600 hover:underline font-medium">
                إنشاء حساب جديد
            </a>
        </p>
    </div>
@endsection