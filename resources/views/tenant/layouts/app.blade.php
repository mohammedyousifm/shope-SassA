<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('tenant.layouts.head')

<body class="min-h-screen islamic-pattern">

    <div cclass="min-h-screen">

        @include('tenant.layouts.sidebar')

        {{-- Main Content --}}
        <div class="lg:mr-64 min-h-screen">

            @include('tenant.layouts.header')
            @include('components.alerts')

            @yield('contain')

        </div>

    </div>

    @include('tenant.layouts.footer')
</body>

</html>