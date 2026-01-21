
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
        }

        .gradient-border {
            position: relative;
            background: white;
            border-radius: 1rem;
        }

        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 1rem;
            padding: 2px;
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        .custom-checkbox {
            appearance: none;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid #d1d5db;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }

        .custom-checkbox:checked {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            border-color: #14b8a6;
        }

        .custom-checkbox:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 0.875rem;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        input[type="number"] {
            direction: ltr;
            text-align: right;
        }
    </style>


    <div class="max-w-xl mx-auto">
        <div class="gradient-border bg-white p-8 rounded-2xl shadow-xl relative">
            <!-- Header with icon -->
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-1xl font-bold text-gray-800">
                    إعدادات رسوم الطلب
                </h1>
            </div>

            <form method="POST" action="{{ route('dashboard.order-charge.update') }}">
                @csrf
                @method('PUT')

                <!-- Enable / Disable -->
                <div class="mb-6 p-4 bg-gradient-to-r from-teal-50 to-cyan-50 rounded-xl border border-teal-100">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="hidden" name="is_enabled" value="0">
                        <input type="checkbox" name="is_enabled" value="1" {{ $setting->is_enabled ? 'checked' : '' }}
                            class="custom-checkbox">
                        <span class="font-semibold text-gray-700 text-lg">تفعيل رسوم الطلب</span>
                    </label>
                    <p class="text-sm text-gray-500 mr-8 mt-1">قم بتفعيل أو إلغاء تفعيل الرسوم الإضافية على الطلبات</p>
                </div>

                <!-- Amount -->
                <div class="mb-6">
                    <label class="block font-semibold text-gray-700 mb-2 text-lg">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            قيمة الرسوم
                        </div>
                    </label>
                    <div class="relative">
                        <input type="number" step="0.01" name="amount"  value="{{ old('amount', $setting->amount) }}"
                            class="w-full border-2 border-gray-200 rounded-xl px-2 py-2 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 transition-all outline-none text-lg font-medium text-gray-700">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">ج.س</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">أدخل قيمة الرسوم المراد إضافتها على كل طلب</p>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full px-4 py-2 bg-gradient-to-b from-teal-500 to-teal-600 text-white rounded-xl hover:from-teal-600 hover:to-teal-700 font-bold text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    حفظ الإعدادات
                </button>
            </form>
        </div>

        <!-- Info Card -->
        <div class="mt-4 bg-white/80 backdrop-blur-sm p-4 rounded-xl border border-teal-100 shadow-sm">
            <div class="flex gap-3">
                <svg class="w-5 h-5 text-teal-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-sm text-gray-600">
                    سيتم تطبيق هذه الرسوم تلقائياً على جميع الطلبات الجديدة بعد حفظ الإعدادات
                </p>
            </div>
        </div>
    </div>

