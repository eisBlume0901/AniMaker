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
            @auth
                <div class="flex justify-center items-center">
                    <div x-data="{ open: false }" class="z-10 w-64 flex justify-center items-center">
                        <div @click="open = !open" class="relative py-3" :class="{'border-white transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                            <div class="flex justify-center items-center space-x-3 cursor-pointer">
{{--                                User image--}}
                                <div class="w-20 h-20 rounded-full overflow-hidden border-2 border-blue-700">
                                    <img src={{auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/no-image-2.png')}}
                                     alt="" class="w-full h-full object-cover">
                                </div>
{{--                                User name--}}
                                <div class="font-semibold text-white text-lg hover:text-emerald-400">
                                    <div class="cursor-pointer">
                                        {{auth()->user()->name}}
                                    </div>
                                </div>

                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3 bg-white rounded-lg shadow-md shadow-blue-700 hover:shadow-emerald-400 border mt-5">
                                <ul class="space-y-3">
                                    <li class="font-medium">
{{--                                        Still has to put the route and its controller--}}
                                        <a href="/users/account" class="flex hover:text-emerald-400">
                                            <div class="mr-3">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                            </div>
                                            Account
                                        </a>
                                    </li>
                                    <li class="font-medium">
{{--                                        Still has to put the route and its controller--}}
                                        <a href="/users/setting" class="flex hover:text-emerald-400">
                                            <div class="mr-3">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            </div>
                                            Setting
                                        </a>
                                    </li>
                                    <hr class="border-b-blue-700">
                                    <li class="font-medium">
                                        <a href="/logout" class="flex hover:text-red-700">
                                            <div class="mr-3 text-red-600">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                            </div>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <a href="/signup" class="py-1 px-3 text-white flex flex-row gap-x-0.5 hover:text-emerald-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span>
                    Signup
                </span>
            </a>
            <a href="/login" class="py-1 px-3 text-white flex flex-row gap-x-0.5 hover:text-emerald-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
                <span>
                    Login
                </span>
            </a>
            @endauth
        </div>

    </div>
</nav>
@yield('content')
<x-flash-message />
</body>
</html>
