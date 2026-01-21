@extends('tenant.layouts.app')

@section('title', 'تم حظر المتجر')

@section('contain')
    <section class="min-h-[70vh] flex items-center justify-center mt-2">
        <div class="max-w-xl w-full bg-white rounded-2xl shadow-lg border p-8 text-center">

            <!-- Icon -->
            <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-red-50 mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />
                </svg>
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-bold text-gray-900 mb-3">
                تم حظر المتجر
            </h1>

            <!-- Description -->
            <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                تم إيقاف هذا المتجر مؤقتًا ولا يمكن الوصول إلى أي من ميزاته في الوقت الحالي.
                <br>
                يرجى التواصل مع الدعم الفني لمراجعة الحالة وإعادة التفعيل.
            </p>

            <!-- Divider -->
            <div class="border-t my-6"></div>

            <!-- Support -->
            <p class="text-sm text-gray-700 font-medium mb-4">
                للتواصل مع الدعم الفني
            </p>

            <!-- WhatsApp Button -->
            <a href="https://wa.me/917973515804" target="_blank" class="inline-flex items-center justify-center gap-2 w-full py-3 rounded-xl
                                  bg-gradient-to-b from-teal-500 to-teal-600 text-white font-semibold transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2a10 10 0 00-8.47 15.32L2 22l4.83-1.27A10 10 0 1012 2zm0 18a8 8 0 01-4.09-1.12l-.29-.17-2.87.76.77-2.8-.19-.3A8 8 0 1112 20zm4.43-5.47c-.24-.12-1.4-.69-1.62-.77-.22-.08-.38-.12-.54.12s-.62.77-.76.93-.28.18-.52.06a6.58 6.58 0 01-1.94-1.19 7.34 7.34 0 01-1.35-1.68c-.14-.24 0-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.19-.46-.38-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.33.98 2.49c.12.16 1.69 2.58 4.1 3.62.57.25 1.02.4 1.36.51.57.18 1.09.15 1.5.09.46-.07 1.4-.57 1.6-1.12.2-.55.2-1.02.14-1.12-.06-.1-.22-.16-.46-.28z" />
                </svg>
                تواصل معنا عبر واتساب
            </a>

            <!-- Footer -->
            <p class="text-xs text-gray-400 mt-4">
                فريق الدعم متوفر لمساعدتك
            </p>

        </div>
    </section>
@endsection