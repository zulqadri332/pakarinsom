<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar Insomnia Lansia</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(to bottom right, #dff5e1, #fffccf);
        }

        .glow-text {
            text-shadow: 0 0 4px #a3a827aa;
        }
    </style>
</head>
<body class="text-[#1b1b18] flex items-center justify-center min-h-screen flex-col px-4 text-center">

    <h1 class="text-2xl md:text-3xl font-semibold mb-8 glow-text">
        SISTEM PAKAR DIAGNOSA INSOMNIA LANSIA
    </h1>

    @if (Route::has('login'))
        <div class="flex gap-4 flex-col sm:flex-row">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="px-6 py-2 text-sm font-medium rounded-md bg-green-700 text-white hover:bg-green-600 transition"
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="px-6 py-2 text-sm font-medium rounded-md bg-yellow-500 text-black hover:bg-yellow-400 transition"
                >
                    Masuk
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="px-6 py-2 text-sm font-medium rounded-md bg-green-600 text-white hover:bg-green-500 transition"
                    >
                        Daftar
                    </a>
                @endif
            @endauth
        </div>
    @endif

</body>
</html>
