<section id="pricing" class="py-20 mt-5 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block mb-4 px-4 py-1 text-sm rounded-full bg-teal-100 text-teal-700 font-medium">
                الباقات والأسعار
            </span>

            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">
                اختر الباقة المناسبة لأعمالك
            </h2>

            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">
                خطط مرنة تناسب جميع التجار، ابدأ مجانًا وقم بالترقية في أي وقت
            </p>
        </div>

        <!-- Plans Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($plans as $index => $plan)

                    @php
                        $isPopular = $index === 1;
                        $isFree = $plan->price == 0;
                    @endphp

                    <div
                        class="relative rounded-2xl p-8 text-center bg-white border
                                                                                                            {{ $isPopular ? 'border-teal-600 shadow-xl' : 'border-gray-200 shadow-sm' }}
                                                                                                            hover:shadow-xl transition-all duration-300 hover:-translate-y-1">

                        @if ($isPopular)
                            <span class="absolute -top-4 right-4 bg-teal-600 text-white text-xs px-3 py-1 rounded-full">
                                الأكثر استخدامًا
                            </span>
                        @endif

                        <h3 class="text-xl font-semibold text-gray-900 mb-4">
                            {{ $plan->name }}
                        </h3>

                        <!-- Price -->
                        <div class="my-6">
                            @if ($isFree)
                                <span class="text-4xl font-bold text-teal-600">
                                    مجاني
                                </span>
                            @else
                                <span class="text-4xl font-bold text-gray-900">
                                    {{ number_format($plan->price) }} ج.س
                                </span>
                                <span class="text-gray-500 text-sm">/ شهر</span>
                            @endif
                        </div>

                        <!-- Features -->
                        <ul class="space-y-3 text-sm text-gray-600 text-right mb-8">
                            @foreach ($plan->features as $feature)
                                <li class="flex items-center gap-2">
                                    <span class="text-teal-600">✔</span>
                                    <span>{{ $feature->name }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Action -->
                        <form method="POST" action="{{ $isFree
                ? route('merchant.platform.payment.free', $plan)
                : route('merchant.plans.subscribe', $plan) }}">
                            @csrf

                            <button class="block w-full py-3 rounded-xl font-semibold transition {{ $isFree
                ? 'bg-gray-900 text-white hover:bg-gray-800'
                : 'bg-teal-600 text-white hover:bg-teal-700' }}">
                                {{ $isFree ? 'ابدأ مجانًا' : 'اشترك الآن' }}
                            </button>
                        </form>

                    </div>
            @endforeach
        </div>
    </div>
</section>