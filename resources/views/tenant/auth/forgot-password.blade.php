@extends('landing.auth.app')

@section('contain')
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8 relative">


        <div class="absolute -top-4 right-1/2 translate-x-1/2 bg-teal-100 text-teal-700 text-sm px-4 py-1 rounded-full">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit"
                    class="w-full mt-4 bg-teal-600 hover:bg-teal-700 text-white py-3 rounded-xl font-semibold transition shadow-md">
                    Email Password Reset Link
                </button>
            </div>
        </form>

    </div>
@endsection