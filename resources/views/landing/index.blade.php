@extends('landing.layouts.app')

@section('contain')



    <!-- Hero Section -->
    @include('landing.components.hero')

    <!-- How Dashboard Works -->
    <section class="py-16 sm:py-24 px-4 sm:px-6 lg:px-8 bg-white" id="features">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 sm:mb-16 animate-slide-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 mb-4">كيف تعمل لوحة التحكم</h2>
                <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto">
                    إدارة شاملة لجميع جوانب عملك من مكان واحد
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-gradient-to-br from-white to-teal-50 rounded-2xl p-6 sm:p-8 shadow-lg hover-lift border border-teal-100">
                    <div
                        class="feature-icon w-14 h-14 sm:w-16 sm:h-16 rounded-xl flex items-center justify-center mb-4 sm:mb-6">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-teal-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3">إدارة الألعاب</h3>
                    <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                        أضف وعدل الألعاب المتاحة، تحكم في الأسعار والعروض بشكل كامل
                    </p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-gradient-to-br from-white to-cyan-50 rounded-2xl p-6 sm:p-8 shadow-lg hover-lift border border-cyan-100">
                    <div
                        class="feature-icon w-14 h-14 sm:w-16 sm:h-16 rounded-xl flex items-center justify-center mb-4 sm:mb-6">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-cyan-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3">بطاقات الشحن</h3>
                    <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                        إدارة حسابات البطاقات، متابعة شاطوم ومعاملاتهم داخل النظام
                    </p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-gradient-to-br from-white to-teal-50 rounded-2xl p-6 sm:p-8 shadow-lg hover-lift border border-teal-100">
                    <div
                        class="feature-icon w-14 h-14 sm:w-16 sm:h-16 rounded-xl flex items-center justify-center mb-4 sm:mb-6">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-teal-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3">إدارة العملاء</h3>
                    <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                        متابعة شاطوم ومعاملاتهم، إدارة حساباتهم بسهولة وأمان
                    </p>
                </div>

                <!-- Feature 4 -->
                <div
                    class="bg-gradient-to-br from-white to-cyan-50 rounded-2xl p-6 sm:p-8 shadow-lg hover-lift border border-cyan-100">
                    <div
                        class="feature-icon w-14 h-14 sm:w-16 sm:h-16 rounded-xl flex items-center justify-center mb-4 sm:mb-6">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-cyan-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3">إدارة الطلبات</h3>
                    <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                        راجع ومعالج الطلبات، ضمان تنفيذ الطلبات بدقة وسرعة
                    </p>
                </div>

                <!-- Feature 5 -->
                <div
                    class="bg-gradient-to-br from-white to-teal-50 rounded-2xl p-6 sm:p-8 shadow-lg hover-lift border border-teal-100">
                    <div
                        class="feature-icon w-14 h-14 sm:w-16 sm:h-16 rounded-xl flex items-center justify-center mb-4 sm:mb-6">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-teal-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3">المحفظة والأرباح</h3>
                    <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                        تتبع رصيد المحفظة وإجمالي الأرباح والعمولات بدقة
                    </p>
                </div>

                <!-- Feature 6 -->
                <div
                    class="bg-gradient-to-br from-white to-cyan-50 rounded-2xl p-6 sm:p-8 shadow-lg hover-lift border border-cyan-100">
                    <div
                        class="feature-icon w-14 h-14 sm:w-16 sm:h-16 rounded-xl flex items-center justify-center mb-4 sm:mb-6">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-cyan-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3">إحصاءات متقدمة</h3>
                    <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                        تقارير تفصيلية ورسوم بيانية لتتبع أداء عملك
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Preview -->
    <section class="py-16 sm:py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 to-teal-50" id="demo">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 mb-4">لوحة تحكم بسيطة وقوية</h2>
                <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto">
                    تصميم عصري وسهل الاستخدام يوفر لك كل ما تحتاجه
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-2xl p-4 sm:p-8 border border-slate-200">
                <div
                    class="aspect-video bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-4 left-4 right-4 h-12 bg-white rounded-lg"></div>
                        <div class="absolute top-20 left-4 right-64 space-y-4">
                            <div class="h-32 bg-white rounded-lg"></div>
                            <div class="h-32 bg-white rounded-lg"></div>
                            <div class="h-32 bg-white rounded-lg"></div>
                        </div>
                        <div class="absolute top-20 right-4 w-56 space-y-4">
                            <div class="h-40 bg-white rounded-lg"></div>
                            <div class="h-56 bg-white rounded-lg"></div>
                        </div>
                    </div>
                    <div class="relative z-10 text-center">
                        <div
                            class="w-20 h-20 sm:w-24 sm:h-24 mx-auto mb-4 sm:mb-6 gradient-primary rounded-2xl flex items-center justify-center shadow-xl">
                            <svg class="w-10 h-10 sm:w-12 sm:h-12 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-2">واجهة احترافية</h3>
                        <p class="text-sm sm:text-base text-slate-600">كل ما تحتاجه في مكان واحد</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16 sm:py-24 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 mb-4">لماذا تختار منصتنا</h2>
                <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto">
                    مزايا تجعلنا الخيار الأمثل للتجار
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                <div
                    class="flex gap-4 sm:gap-6 items-start p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-teal-50 to-cyan-50 border border-teal-100">
                    <div
                        class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 gradient-primary rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-2">أمان عالي المستوى</h3>
                        <p class="text-sm sm:text-base text-slate-600 leading-relaxed">تشفير كامل للبيانات وحماية متقدمة
                            لضمان سلامة معاملاتك وأموالك</p>
                    </div>
                </div>

                <div
                    class="flex gap-4 sm:gap-6 items-start p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-cyan-50 to-teal-50 border border-cyan-100">
                    <div
                        class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 gradient-secondary rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-2">سرعة فائقة</h3>
                        <p class="text-sm sm:text-base text-slate-600 leading-relaxed">معالجة فورية للطلبات والعمليات
                            لتوفير أفضل تجربة لعملائك</p>
                    </div>
                </div>
            </div>
    </section>

@endsection