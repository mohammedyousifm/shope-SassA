
<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('landing.layouts.head')

   <body class="bg-gradient-to-br from-slate-50 via-teal-50 to-cyan-50 text-slate-800">




            @include('landing.layouts.header')

            @include('components.alerts')

            @yield('contain')


    @include('landing.layouts.footer')
</body>

</html>

