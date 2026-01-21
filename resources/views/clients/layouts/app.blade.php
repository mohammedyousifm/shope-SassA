<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('clients.layouts.head')

<body class="min-h-screen islamic-pattern">

    <div cclass="min-h-screen">

        @include('clients.layouts.sidebar')

        {{-- Main Content --}}
        <div class="lg:mr-64 min-h-screen">

            @include('clients.layouts.header')
            @include('components.alerts')

            @yield('contain')

        </div>

    </div>

    @include('clients.layouts.footer')
</body>

</html>