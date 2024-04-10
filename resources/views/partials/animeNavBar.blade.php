<nav class="bg-blue-700 text-white">
    <div class="max-w-screen-3xl flex flex-wrap items-center justify-between mx-auto px-20 py-4">
        <div class="flex flex-row gap-x-20">

            @livewire('search')
            
            <button id="genre-button" class="hover:text-emerald-400 hover:border-b-emerald-400 px-2 -ml-8">Genre</button>
            <div id="genre-dropdown" class="absolute mt-10 ml-60 z-10 w-80 rounded-lg bg-white shadow-lg shadow-blue-700 hover:shadow-emerald-400 ring-1 ring-black ring-opacity-5 focus:outline-none hidden p-2" tabindex="-1">
                <div class="flex flex-wrap" id="genre-entry">
                    @foreach($genres as $genreName)
                        <div class="w-1/2 text-blue-700 text-sm px-4 py-2 bg-white rounded-2xl hover:bg-blue-700 hover:text-white hover:rounded-3xl hover:font-bold active:bg-gradient-to-br active:from-emerald-400 active:to-blue-700 transition ease-in-out duration-150">
                            <a href="/?genre={{$genreName->genre}}" id="{{$genreName->id}}-genre">{{ $genreName->genre}}
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
        <div class="flex flex-row gap-x-20">
{{--            Still have to put the route and its controller--}}
            <a href="/animes/toprated" class="hover:text-emerald-400">Top Rated</a>
            <a href="/users/mylist" class="hover:text-emerald-400">My List</a>
        </div>

    </div>
</nav>
