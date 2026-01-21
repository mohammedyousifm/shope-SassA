@extends('clients.layouts.app')

@section('title', 'نقطه ويب سيرفر - شحن الألعاب')

@section('contain')

    <div class="min-h-screen  rounded-2xl p-6">

        {{-- Tabs --}}
        <div class="flex justify-start gap-2 mb-6 text-sm">

            <button id="tab-info" type="button"
                class="tab-btn flex items-center gap-1 px-4 py-2 rounded-lg
                                                                       bg-gradient-to-b from-teal-500 to-teal-600 text-white">
                <i class="fa-solid fa-user"></i>
                ملفي الشخصي
            </button>

            <button id="tab-edit" type="button" class="tab-btn flex items-center gap-1 px-4 py-2 rounded-lg
                                                                       bg-white text-teal-600 shadow">
                <i class="fa-solid fa-pen"></i>
                تعديل البيانات
            </button>

        </div>


        {{-- Profile Info (افتراضي) --}}
        <div id="profile-info">
            @include('clients.models.profile-info')
        </div>

        {{-- Profile Edit --}}
        <div id="profile-edit" class="hidden">
            @include('clients.models.profile-edit')
        </div>

    </div>



    <script>
        const tabInfo = document.getElementById('tab-info');
        const tabEdit = document.getElementById('tab-edit');

        const profileInfo = document.getElementById('profile-info');
        const profileEdit = document.getElementById('profile-edit');

        function activateTab(activeBtn, inactiveBtn) {
            activeBtn.classList.remove('bg-white', 'text-teal-600', 'shadow');
            activeBtn.classList.add(
                'bg-gradient-to-b',
                'from-teal-500',
                'to-teal-600',
                'text-white'
            );

            inactiveBtn.classList.remove(
                'bg-gradient-to-b',
                'from-teal-500',
                'to-teal-600',
                'text-white'
            );
            inactiveBtn.classList.add('bg-white', 'text-teal-600', 'shadow');
        }

        tabInfo.addEventListener('click', () => {
            profileInfo.classList.remove('hidden');
            profileEdit.classList.add('hidden');

            activateTab(tabInfo, tabEdit);
        });

        tabEdit.addEventListener('click', () => {
            profileEdit.classList.remove('hidden');
            profileInfo.classList.add('hidden');

            activateTab(tabEdit, tabInfo);
        });
    </script>

@endsection