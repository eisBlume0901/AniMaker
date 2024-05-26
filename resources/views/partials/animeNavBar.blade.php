<nav class="bg-blue-700 text-white">
    <div class="max-w-screen-3xl flex flex-row flex-wrap items-center justify-between mx-auto px-20 py-4">
        <div class="flex md:flex-row gap-x-20 sm:flex-col">

            @livewire('search')

            <button id="genre-button" class="hover:text-emerald-400 hover:border-b-emerald-400 px-2 -ml-8 sm:my-0.5">Genre</button>
            <div id="genre-dropdown" class="absolute mt-10 ml-60 z-20 w-80 rounded-lg bg-white shadow-lg shadow-blue-700 hover:shadow-emerald-400 ring-1 ring-black ring-opacity-5 focus:outline-none hidden p-2" tabindex="-1">
                <div class="flex flex-wrap" id="genre-entry">
                    @foreach($genres as $genreName)
                        <div class="w-1/2 text-blue-700 text-sm px-4 py-2 bg-white rounded-2xl hover:bg-blue-700 hover:text-white hover:rounded-3xl hover:font-bold active:bg-gradient-to-br active:from-emerald-400 active:to-blue-700 transition ease-in-out duration-150">
                            <a href="{{route('index', ['genre' => $genreName->genre])}}" id="{{$genreName->id}}-genre">{{ $genreName->genre}}
                        </div>
                    @endforeach
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

        </div>
        <div class="flex md:flex-row gap-x-20 sm:flex-col sm:gap-y-2 sm:content-center">
{{--            Still have to put the route and its controller--}}
            <a href="{{route('show_top_animes')}}" class="hover:text-emerald-400">Top Rated</a>
            <a href="{{route('show_anime_list')}}" class="hover:text-emerald-400">My List</a>
        </div>

    </div>
</nav>
