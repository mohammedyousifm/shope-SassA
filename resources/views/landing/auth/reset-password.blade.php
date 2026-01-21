@extends('landing.auth.app')

@section('contain')
    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8 relative text-right" dir="rtl">

        <!-- Floating Info -->
        <div
            class="absolute -top-4 right-1/2 translate-x-1/2 bg-teal-600 text-white text-sm px-5 py-1.5 rounded-full shadow-lg">
            إعادة تعيين كلمة المرور 🔐
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mt-6 mb-2">
            تعيين كلمة مرور جديدة
        </h2>

        <p class="text-gray-500 text-sm text-center mb-6">
            أدخل كلمة مرور جديدة لحسابك ثم قم بتأكيدها.
        </p>

        <form method="POST" action="{{ route('merchant.password.store') }}">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    البريد الإلكتروني
                </label>

                <input id="email" type="email" name="email" value="{{ old('email', request('email')) }}" required autofocus
                    autocomplete="username"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" />

                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    كلمة المرور الجديدة
                </label>

                <input id="password" type="password" name="password" required autocomplete="new-password"
                    placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" />

                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    تأكيد كلمة المرور
                </label>

                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition" />

                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-teal-600 hover:bg-teal-700 text-white py-3 rounded-xl font-semibold transition-all shadow-md hover:shadow-lg">
                إعادة تعيين كلمة المرور
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