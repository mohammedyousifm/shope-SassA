{{-- ✅ رسائل النجاح والخطأ --}}
@foreach (['success', 'error'] as $type)
    @if(session($type))
        <div id="flash-message"
            class="fixed top-6 left-1/2 transform -translate-x-1/2 px-2 py-2 rounded-lg shadow-lg flex items-center space-x-4 z-50 transition-opacity duration-500
                                                                                                {{ $type == 'success' ? 'bg-green-100 text-green-800 border border-green-400' : 'bg-red-100 text-red-800 border border-red-400' }}">
            <span>
                {{ $type == 'success' ? '✅' : '❌' }}
            </span>
            <span class="f-12 break-words max-w-xs block">{{ session($type) }}</span>
            <button onclick="this.parentElement.remove()" class="font-bold ml-4">✖️</button>
        </div>
    @endif
@endforeach

{{-- ❌ أخطاء التحقق --}}
@if ($errors->any())
    <div id="flash-message"
        class="fixed top-6 left-1/2 transform -translate-x-1/2  px-2 py-2 rounded-lg shadow-lg bg-red-100 text-red-800 border border-red-400 z-50 transition-opacity duration-500">
        <div class="flex items-start justify-between space-x-4">
            <div>
                <p class="font-bold f-12 mb-2">حدثت الأخطاء التالية:</p>
                <ul class="list-disc list-inside space-y-1 f-12">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="font-bold ml-4 text-sm">✖️</button>
        </div>
    </div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const flash = document.getElementById('flash-message');
        if (flash) {
            setTimeout(() => {
                flash.classList.add('opacity-0');
                setTimeout(() => flash.remove(), 500);
            }, 5000);
        }
    });
</script>