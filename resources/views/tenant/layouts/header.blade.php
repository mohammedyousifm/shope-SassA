<!-- Header -->
<header class="bg-white shadow-md px-4 py-2 flex items-center justify-between">

    <!-- Right Icons -->
    <div class="flex items-center"> </div>


    <!-- User Profile -->


    <!-- User Profile -->
    <a href="" class="flex items-center gap-2 rounded-full px-4 py-2 cursor-pointer
                                  bg-green-50 hover:bg-green-100 transition">

        {{-- Avatar --}}
        <div class="w-10 h-10 bg-gradient-to-b from-teal-500 to-teal-600
                                       rounded-full flex items-center justify-center
                                       text-white font-bold relative">

            M

            {{-- Online indicator --}}
            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400
                                           rounded-full border-2 border-white">
            </span>
        </div>

        {{-- Name --}}
        <span class="text-sm font-semibold text-gray-700">
            Mohammed
        </span>
    </a>


</header>

<script>
    // JavaScript to toggle sidebar
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');

        // Optional: Add animation class for smooth transition
        sidebar.classList.toggle('-translate-x-full');
    });

    // Alternative version with more control:
    let isOpen = true;

    toggleBtn.addEventListener('click', () => {
        if (isOpen) {
            sidebar.style.display = 'none';
        } else {
            sidebar.style.display = 'block';
        }
        isOpen = !isOpen;
    });
</script>