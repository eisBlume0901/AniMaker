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
    <title>@yield('title')</title>
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white text-blue-700 font-display">
<nav class="bg-gradient-to-r from-emerald-400 to-blue-700">
    <div class="max-w-screen-3xl flex flex-wrap items-center justify-between mx-auto px-16 py-4">
        <a href="/" class="flex items-center space-x-3 trl:space-x-reverse">
            <img src="{{asset('images/AniMaKer_Official_Logo.png')}}" alt="AniMaKer Official Logo" class="max-w-60">
        </a>

        @auth
        <div class="flex items-center space-x-6 rtl:space-x-reverse">


                <div class="flex justify-center items-center">
                    <div x-data="{ open: false }" class="z-30 w-64 flex justify-center items-center">
                        <div @click="open = !open" class="relative py-3" :class="{'border-white transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                            <div class="flex justify-center items-center space-x-3 cursor-pointer">
{{--                                User image--}}
                                <div class="w-20 h-20 object-cover rounded-full overflow-hidden border-2 border-blue-700">
                                    <img src={{auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/no-image-2.png')}}
                                     alt="{{auth()->user()->name}}" class="w-full h-full">
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
{{--                                    <li class="font-medium">--}}
{{--                                        Still has to put the route and its controller--}}
{{--                                        <a href="/users/account" class="flex hover:text-emerald-400">--}}
{{--                                            <div class="mr-3">--}}
{{--                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>--}}
{{--                                            </div>--}}
{{--                                            My Account--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    For Admin Access Only--}}

                                    @role('admin')
                                    <li class="font-medium">

                                        <a href="{{route('manage_animes')}}" class="flex hover:text-emerald-400">

                                            <div class="mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                                </svg>
                                            </div>
                                            Manage Anime
                                        </a>
                                    </li>

                                    <li class="font-medium">

                                        <a href="{{route('manage_users')}}" class="flex hover:text-emerald-400">

                                            <div class="mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                </svg>
                                            </div>
                                            Manage Users
                                        </a>
                                    </li>

                                    @endrole

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
                <div class="flex flex-row">
                    <a href="{{route('signup')}}" class="py-1 px-3 text-white flex flex-row gap-x-0.5 hover:text-emerald-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span>
                            Signup
                        </span>
                    </a>
                    <a href="{{route('login')}}" class="py-1 px-3 text-white flex flex-row gap-x-0.5 hover:text-emerald-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        <span>
                            Login
                        </span>
                    </a>
                </div>

        </div>

        @endauth
    </div>
</nav>
@yield('content')
<x-flash-message />
@livewireScripts
</body>
</html>
