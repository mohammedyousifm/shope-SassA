<div class="card bg-white rounded-2xl shadow-lg p-4">

    {{-- Header --}}
    <div class="flex items-center justify-center gap-3 mb-6">
        <svg class="w-7 h-7 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2" />
        </svg>
        <h2 class="text-xl font-bold text-gray-800 border-b-4 border-teal-500 pb-2">
            سجل العمليات
        </h2>
    </div>


    @if ($gameOrders->count())

        {{-- Responsive Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-[900px] w-full text-sm text-right border rounded-lg">
                <thead class="bg-gray-50 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">رقم الطلب</th>
                        <th class="px-4 py-3">اللعبة</th>
                        <th class="px-4 py-3">الباقة</th>
                        <th class="px-4 py-3">Player ID</th>
                        <th class="px-4 py-3">المبلغ</th>
                        <th class="px-4 py-3">الحالة</th>
                        <th class="px-4 py-3">التاريخ</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach ($gameOrders as $order)
                        <tr class="hover:bg-gray-50">

                            <td class="px-4 py-3 font-medium">
                                {{ $order->order_number }}
                            </td>

                            <td class="px-4 py-3 font-medium">
                                {{ $order->game->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $order->package->name }}
                            </td>

                            <td class="px-4 py-3 font-mono">
                                {{ $order->player_id }}
                            </td>

                            <td class="px-4 py-3 font-semibold text-teal-600">
                                {{ number_format($order->price) }} ج.س
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs rounded {{ $order->status_badge_class }}">
                                    {{ $order->status_label }}
                                </span>
                            </td>


                            <td class="px-4 py-3 text-gray-500">
                                {{ $order->created_at->format('Y-m-d H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-6">
                {{ $gameOrders->links() }}
            </div>

        </div>

    @else
        {{-- Empty --}}
        <div class="text-center text-gray-400 py-12">
            <svg class="w-14 h-14 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <p class="text-lg">لا توجد عمليات بعد</p>
        </div>
    @endif

</div>
