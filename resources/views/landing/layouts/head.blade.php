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

        .gradient-primary {
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
        }

        .gradient-secondary {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .sticky-cta {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 50;
            transition: all 0.3s ease;
        }

        @media (min-width: 768px) {
            .sticky-cta {
                display: none;
            }
        }

        .feature-icon {
            background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
        }

        .pricing-card-popular {
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
            color: white;
        }

        .stats-number {
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>

</head>