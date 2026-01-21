@extends('auth.app')
@section('title', '403 - غير مصرح بالدخول')

@section('contain')
    <section class="min-h-screen flex items-center justify-center
                        bg-gradient-to-br from-slate-50 via-teal-50 to-cyan-50 px-4">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 text-center">

            {{-- Icon --}}
            <div class="w-20 h-20 mx-auto mb-6 rounded-full
                            bg-gradient-to-b from-teal-500 to-teal-600
                            flex items-center justify-center shadow-lg">
                <i class="fas fa-ban text-white text-3xl"></i>
            </div>

            {{-- Code --}}
            <h1 class="text-5xl font-extrabold text-gray-800 mb-2">403</h1>

            {{-- Title --}}
            <h2 class="text-xl font-bold text-teal-600 mb-4">
                غير مصرح لك بالدخول
            </h2>

            {{-- Description --}}
            <p class="text-gray-600 text-sm leading-relaxed mb-8">
                عذرًا، ليس لديك صلاحية للوصول إلى هذه الصفحة.
                إذا كنت تعتقد أن هذا خطأ، يرجى التواصل مع الدعم الفني
                أو العودة إلى الصفحة الرئيسية.
            </p>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row gap-3 justify-center">

                <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl
                              text-sm font-bold text-teal-700 bg-teal-100
                              hover:bg-teal-200 transition-all">
                    <i class="fas fa-arrow-right"></i>
                    العودة للخلف
                </a>

                <a href="/" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl
                              text-sm font-bold text-white
                              bg-gradient-to-b from-teal-500 to-teal-600
                              shadow-lg shadow-teal-200
                              hover:shadow-xl hover:scale-[1.03]
                              transition-all">
                    <i class="fas fa-home"></i>
                    الصفحة الرئيسية
                </a>

            </div>

        </div>
    </section>
@endsection