@extends('landing.auth.app')

@section('contain')
    <div class="w-full mt-10 max-w-md bg-white rounded-3xl shadow-xl p-4 relative">

        <!-- Badge -->
        <div class="absolute -top-4 right-1/2 translate-x-1/2 bg-teal-100 text-teal-700 text-sm px-4 py-1 rounded-full">
            منصة إدارة متاجر رقمية
        </div>

        <h1 class="text-3xl font-bold text-center text-gray-900 mt-4">
            إنشاء حساب تاجر
        </h1>

        <p class="text-gray-500 text-center mt-2 mb-8">
            ابدأ بإدارة مبيعاتك وشحن الألعاب بكل سهولة
        </p>

        <form method="POST" action="{{ route('merchant.register.store') }}" class="space-y-4">
            @csrf

            <div>
                <input type="text" name="store_name" placeholder="اسم المتجر"
                    class="w-full rounded-xl border border-gray-200 px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                    required>
            </div>



            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">
                    اسم المتجر
                </label>

                <div
                    class="flex rounded-xl border border-gray-300 focus-within:ring-2 focus-within:ring-teal-500 focus-within:border-teal-500 overflow-hidden">
                    <span class="bg-gray-50 px-3 py-2 text-gray-500 text-sm border-l">
                        subd.test.
                    </span>
                    <input type="text" name="subdomain" id="subdomain" placeholder="myshop"
                        class="flex-1 px-3 py-2 focus:outline-none" required oninput="updatePreview()" />
                </div>

                <p class="text-sm text-gray-500">
                    رابط متجرك:
                    <span class="font-medium text-gray-700" id="preview">—</span>
                </p>
            </div>

            <script>
                function updatePreview() {
                    const input = document.getElementById("subdomain");
                    const value = input.value
                        .toLowerCase()
                        .replace(/[^a-z0-9-]/g, "");

                    input.value = value;

                    document.getElementById("preview").textContent =
                        value ? `${value}.subd.test` : "—";
                }
            </script>


            <div>
                <input type="text" name="name" placeholder="اسمك الكامل"
                    class="w-full rounded-xl border border-gray-200 px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                    required>
            </div>

            <div>
                <input type="email" name="email" placeholder="البريد الإلكتروني"
                    class="w-full rounded-xl border border-gray-200 px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                    required>
            </div>

            <div>
                <input type="password" name="password" placeholder="كلمة المرور"
                    class="w-full rounded-xl border border-gray-200 px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                    required>
            </div>

            <button type="submit"
                class="w-full mt-4 bg-teal-600 hover:bg-teal-700 text-white py-3 rounded-xl font-semibold transition shadow-md">
                إنشاء الحساب
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            لديك حساب بالفعل؟
            <a href="{{ route('merchant.login') }}" class="text-teal-600 hover:underline font-medium">
                تسجيل الدخول
            </a>
        </p>
    </div>
@endsection
