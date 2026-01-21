@extends('landing.auth.app')

@section('contain')
    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8 relative text-right" dir="rtl">

        <!-- Floating Info -->
        <div
            class="absolute -top-4 right-1/2 translate-x-1/2 bg-teal-600 text-white text-sm px-5 py-1.5 rounded-full shadow-lg">
            نسيت كلمة المرور؟ لا تقلق 🙂
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mt-6 mb-2">
            استعادة كلمة المرور
        </h2>

        <p class="text-gray-500 text-sm text-center mb-6">
            أدخل بريدك الإلكتروني وسنرسل لك رابطًا لإعادة تعيين كلمة المرور الخاصة بك.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded-xl p-3 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('merchant.password.email') }}">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    البريد الإلكتروني
                </label>

                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="example@email.com"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" />

                @error('email')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full mt-6 bg-teal-600 hover:bg-teal-700 text-white py-3 rounded-xl font-semibold transition-all shadow-md hover:shadow-lg">
                إرسال رابط إعادة التعيين
            </button>
        </form>

        <!-- Back to login -->
        <div class="mt-6 text-center">
            <a href="{{ route('merchant.login') }}" class="text-sm text-teal-600 hover:underline">
                العودة إلى تسجيل الدخول
            </a>
        </div>

    </div>
@endsection