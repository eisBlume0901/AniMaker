<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Noto+Sans+Pau+Cin+Hau&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>AniMaKer</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white text-blue-700 font-display">
<nav class="bg-gradient-to-r from-emerald-400 to-blue-700">
    <div class="max-w-screen-3xl flex flex-wrap items-center justify-between mx-auto px-16 py-4">
        <a href="/" class="flex items-center space-x-3 trl:space-x-reverse">
            <img src="{{asset('images/AniMaKer_Official_Logo.png')}}" alt="AniMaKer Official Logo" class="max-w-60">
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <a href="/signup" class="py-1 px-3 text-white flex flex-row gap-x-0.5 hover:text-emerald-400 hover:bg-white hover:rounded-2xl">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span>
                    Signup
                </span>
            </a>
            <a href="/login" class="py-1 px-3 text-white flex flex-row gap-x-0.5 hover:text-emerald-400 hover:bg-white hover:rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
                <span>
                    Login
                </span>
            </a>
        </div>
    </div>
</nav>
@yield('content')
<x-flash-message />
</body>
</html>
