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
<div class="mx-auto flex flex-row md:flex justify-between items-center bg-emerald-400 text-white">
        <a href="#" id="hamburger-icon" class="text-white hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-14 h-14">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </a>
        <a href="#" class="md:flex-col w-full md:ml-16"><img src="{{asset('images/AniMaKer_Official_Logo.png')}}" alt="AniMaKer Official Logo" class="max-w-60"></a>
        <a href="#" class="flex flex-row justify-evenly items-center gap-0.5 text-white hover:text-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="max-w-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            <div class="w-24 mr-3 md:mr-16">
                Sign in
            </div>
        </a>

</div>
<nav class="bg-blue-700 text-white py-2">
    <div class="mx-auto flex flex-col md:flex-row items-center justify-between px-3 py-1">
        <div class="flex flex-col md:flex-row items-center">
            <div class="relative">
                <label>
                    <input type="text" class="bg-white text-blue-700  rounded-full w-50 px-2 py-1 focus:outline-none focus:shadow-outline md:ml-16" placeholder=" Search">
                </label>
            </div>
            <div class="relative">
                <button id="genre-button" class="hover:bg-white hover:text-blue-700 rounded-2xl px-3 py-0.5 md:ml-16">Genre</button>
                <div id="genre-dropdown" class="absolute mt-5 z-10 w-80 lg:ml-16 md:mx-auto rounded-lg bg-white shadow-lg shadow-blue-700 ring-1 ring-black ring-opacity-5 focus:outline-none hidden p-2" tabindex="-1">
                    <div class="flex flex-wrap" id="genre-entry">
                        @foreach($genres as $genreName)
                            <div class="w-1/2 text-blue-700 text-sm px-4 py-2 bg-white hover:bg-blue-700 hover:text-white hover:rounded-3xl hover:font-bold active:bg-emerald-400">
                                <a href="/?genre={{$genreName->genre}}" id="{{$genreName->id}}-genre">{{ $genreName->genre}}
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
            <script>
                const genreButton = document.getElementById('genre-button');

                genreButton.addEventListener('mouseover', function() {
                    document.getElementById('genre-dropdown').classList.remove('hidden');
                });


                const genreEntry = document.getElementById('genre-entry');
                genreEntry.addEventListener('mouseleave', function() {
                    document.getElementById('genre-dropdown').classList.add('hidden');
                });
            </script>

            <a href="#"></a>
        </div>
        <div class="relative">
            <ul class="flex flex-col md:flex-row items-center">
                <li class="md:mr-14 mt-3 md:mt-0"><a href="#" class="hover:bg-white hover:text-blue-700 rounded-2xl px-3 py-0.5 ">My List</a></li>
                <li class="md:mr-14 mt-3 md:mt-0"><a href="#" class="hover:bg-white hover:text-blue-700 rounded-2xl px-3 py-0.5">Top Rated</a></li>
            </ul>
        </div>

    </div>
</nav>
@yield('content')
</body>
</html>
