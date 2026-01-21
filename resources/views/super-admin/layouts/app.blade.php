<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('super-admin.layouts.head')

<body class="min-h-screen islamic-pattern">

    <div cclass="min-h-screen">

        @include('super-admin.layouts.sidebar')

        {{-- Main Content --}}
        <div class="lg:mr-64 min-h-screen">

            @include('super-admin.layouts.header')
            @include('components.alerts')

            @yield('contain')

        </div>

    </div>

    @include('super-admin.layouts.footer')
</body>

</html>
