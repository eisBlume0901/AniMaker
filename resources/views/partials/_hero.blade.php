<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniMaKer</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
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
        <a href="#"><i class=""></i></a>
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

                <button class="genre-button md:ml-16 md:mt-0 hover:font-bold">GENRE</button>
                <div id="genre-dropdown" class="absolute w-80 mt-5 lg:ml-16 md:mx-auto rounded-lg bg-white shadow-lg shadow-emerald-300 ring-1 ring-black ring-opacity-5 focus:outline-none hidden" tabindex="-1">
                    <div class="flex flex-wrap p-2">
                        @foreach($genres as $genreName)
                            <div class="lg:w-1/2 sm:w-full md:w-1/2 text-blue-700 text-sm px-4 py-2 hover:bg-emerald-400 hover:text-white hover:rounded-lg hover:font-bold active:bg-blue-700">
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
                const genreButton = document.querySelector('.genre-button');

                genreButton.addEventListener('click', function() {
                    document.getElementById('genre-dropdown').classList.toggle('hidden');
                });

            </script>

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
