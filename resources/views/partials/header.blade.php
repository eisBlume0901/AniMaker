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
    <title>AniMaKer</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-blue-700 font-display">
<div class="mx-auto flex flex-row md:flex justify-between items-center bg-emerald-400 text-white">
        <a href="#" id="hamburger-icon" class="text-white hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-14 h-14">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </a>
        <a href="/" class="md:flex-col w-full md:ml-16"><img src="{{asset('images/AniMaKer_Official_Logo.png')}}" alt="AniMaKer Official Logo" class="max-w-60"></a>
        <a href="#" class="flex flex-row justify-evenly items-center gap-0.5 text-white hover:text-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="max-w-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            <div class="w-24 mr-3 md:mr-16">
                Sign in
            </div>
        </a>

</div>
@yield('content')
</body>
</html>
