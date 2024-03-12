<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniMaKer</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-white text-blue-700 ">
<div class="mx-auto flex flex-col md:flex-row items-center justify-between p-5 bg-emerald-400 text-white">
    <div class="flex flex-col md:flex-row items-center">
        <div class="md:ml-16 mt-3 md:mt-0">
            <a href="#">
                <img src="https://i.ibb.co/N14Xkyk/fuuko-izumo.jpg" alt="avatar" class="rounded-full w-20 h-20"/>
            </a>
        </div>
        <div class="md:ml-6 mt-3 md:mt-0 font-semibold text-2xl">Hello, Fuuko Izumo</div>

    </div>
    <div class="flex flex-col md:flex-row items-center">
        <div class="md:mr-16 mt-3 md:mt-0 font-bold text-4xl text-white">
            <a href="#" class="hover:text-blue-700">AniMaKer</a></div>
    </div>
</div>
<nav class="bg-blue-700 text-white py-2">
    <div class="mx-auto flex flex-col md:flex-row items-center justify-between px-3 py-1">
        <div class="flex flex-col md:flex-row items-center">
            <div class="relative">
                <input type="text" class="bg-white text-blue-700  rounded-full w-50 px-2 py-0.5 focus:outline-none focus:shadow-outline md:ml-16 mt-3 md:mt-0" placeholder="Search">
            </div>
            <a href="#"></a>
        </div>
        <ul class="flex flex-col md:flex-row items-center">
            <li class="md:mr-16 mt-3 md:mt-0"><a href="#" class="hover:font-bold">My List</a></li>
            <li class="md:mr-16 mt-3 md:mt-0"><a href="#" class="hover:font-bold">My Favorites</a></li>
            <li class="md:mr-16 mt-3 md:mt-0"><a href="#" class="hover:font-bold">Top Rated</a></li>
        </ul>
    </div>
</nav>
@yield('content')
</body>
</html>
