<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" type="image/x-icon" href="{">
    <title>@yield('title', 'Home')</title>

    @include('components.libraries')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
        }

        .sidebar-item {
            transition: all 0.3s ease;
        }

        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(-5px);
        }

        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-charge {
            transition: all 0.3s ease;
        }

        .btn-charge:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(23, 162, 184, 0.4);
        }

        .f-11 {
            font-size: 11px
        }

        .f-12 {
            font-size: 12px
        }

        .f-13 {
            font-size: 13px
        }
    </style>
</head>
