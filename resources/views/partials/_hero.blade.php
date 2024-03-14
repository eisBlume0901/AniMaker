<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniMaKer</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-white text-blue-700">
<div class="mx-auto flex flex-col md:flex-row justify-between items-center p-0 bg-emerald-400 text-white">
    <div class="ml-16">
        <a href="#" class="hover:text-blue-700"><img src="{{asset('images/AniMaKer_Official_Logo.png')}}" alt="AniMaKer Official Logo" class="w-1/6"></a>
    </div>
    <div class="mr-16">
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 text-white hover:text-blue-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </a>
    </div>
</div>
<nav class="bg-blue-700 text-white py-2">
    <div class="mx-auto flex flex-col md:flex-row items-center justify-between px-3 py-1">
        <div class="flex flex-col md:flex-row items-center">
            <div class="relative">
                <input type="text" class="bg-white text-blue-700  rounded-full w-50 px-2 py-0.5 focus:outline-none focus:shadow-outline md:ml-16 mt-3 md:mt-0" placeholder="Search">
            </div>
            <div class="relative">
{{--                <button class="genre-button md:ml-16 md:mt-3 hover:font-bold">Genre</button>--}}
{{--                <div id="genre-dropdown" class="absolute z-10 mt-2 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" tabindex="-1">--}}
{{--                    <div class="grid lg:grid-cols-3 lg:w-80 md:grid-cols-2 md:w-30 sm:grid-cols-1">--}}
{{--                        @foreach($genres as $genreName)--}}
{{--                            <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                                <a href="/?genre={{$genreName->genre}}" id="{{$genreName->id}}-genre">{{ $genreName->genre}}--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}

                <button id="genre-button" class="md:ml-16 md:mt-0  hover:bg-white hover:text-blue-700 rounded-2xl px-3 py-0.5">Genre</button>
                <div id="genre-dropdown" class="absolute w-80 mt-5 lg:ml-16 md:mx-auto rounded-lg bg-white shadow-lg shadow-emerald-300 ring-1 ring-black ring-opacity-5 focus:outline-none hidden p-2" tabindex="-1">
                    <div class="flex flex-wrap" id="genre-entry">
                        @foreach($genres as $genreName)
                            <div class="lg:w-1/2 sm:w-full md:w-1/2 text-blue-700 text-sm px-4 py-2 hover:bg-emerald-400 hover:text-white hover:rounded-3xl hover:font-bold active:bg-blue-700">
                                <a href="/?genre={{$genreName->genre}}" id="{{$genreName->id}}-genre">{{ $genreName->genre}}
                            </div>
                        @endforeach
                    </div>
                </div>

{{--                <button class="genre-button md:ml-16 md:mt-3 hover:font-bold">Genre</button>--}}
{{--                <div id="genre-dropdown" class="absolute z-10 mt-2 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" tabindex="-1">--}}
{{--                    <div class="grid lg:auto-cols-auto lg:w-80 md:grid-cols-2 md:w-30">--}}
{{--                        <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                            <a href="#" id="1-genre">Action</a>--}}
{{--                        </div>--}}
{{--                        <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                            <a href="#" id="2-genre">Adventure</a>--}}
{{--                        </div>--}}
{{--                        <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                            <a href="#" id="3-genre">Comedy</a>--}}
{{--                        </div>--}}
{{--                        <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                            <a href="#" id="4-genre">Drama</a>--}}
{{--                        </div>--}}
{{--                        <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                            <a href="#" id="5-genre">Fantasy</a>--}}
{{--                        </div>--}}
{{--                        <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                            <a href="#" id="6-genre">Horror</a>--}}
{{--                        </div>--}}
{{--                        <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                            <a href="#" id="7-genre">Mystery</a>--}}
{{--                        </div>--}}
{{--                        <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                            <a href="#" id="8-genre">Psychological</a>--}}
{{--                        </div>--}}
{{--                        <div class="text-blue-700 px-4 py-2 hover:bg-emerald-400 hover:text-white">--}}
{{--                            <a href="#" id="9-genre">Romance</a>--}}
{{--                        </div>--}}

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
        <ul class="flex flex-col md:flex-row items-center">
            <li class="md:mr-16 mt-3 md:mt-0"><a href="#" class="hover:bg-white hover:text-blue-700 rounded-2xl px-3 py-0.5">My List</a></li>
            <li class="md:mr-16 mt-3 md:mt-0"><a href="#" class="hover:bg-white hover:text-blue-700 rounded-2xl px-3 py-0.5">My Favorites</a></li>
            <li class="md:mr-16 mt-3 md:mt-0"><a href="#" class="hover:bg-white hover:text-blue-700 rounded-2xl px-3 py-0.5">Top Rated</a></li>
        </ul>
    </div>
</nav>
@yield('content')
</body>
</html>
