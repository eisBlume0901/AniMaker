<nav class="bg-blue-700 text-white py-2">
    <div class="mx-auto flex flex-col md:flex-row items-center justify-between px-3 py-1">
        <div class="flex flex-col md:flex-row items-center">
            <div class="relative">
                <label>
                    <input type="text" class="bg-white text-blue-700  rounded-full w-50 px-2 py-1 focus:outline-none focus:shadow-outline md:ml-16" placeholder=" Search">
                </label>
            </div>
            <div class="relative">
                <button id="genre-button" class="hover:bg-white hover:text-blue-700 hover:font-bold rounded-2xl px-3 py-1 md:ml-16">Genre</button>
                <div id="genre-dropdown" class="absolute mt-5 z-10 w-80 lg:ml-16 md:mx-auto rounded-lg bg-white shadow-lg shadow-blue-700 hover:shadow-emerald-400 ring-1 ring-black ring-opacity-5 focus:outline-none hidden p-2" tabindex="-1">
                    <div class="flex flex-wrap" id="genre-entry">
                        @foreach($genres as $genreName)
                            <div class="w-1/2 text-blue-700 text-sm px-4 py-2 bg-white rounded-2xl hover:bg-blue-700 hover:text-white hover:rounded-3xl hover:font-bold active:bg-gradient-to-br active:from-emerald-400 active:to-blue-700 transition ease-in-out duration-150">
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
                <li class="md:mr-14 mt-3 md:mt-0"><a href="#" class="hover:bg-white hover:text-blue-700 hover:font-bold rounded-2xl px-3 py-1 ">My List</a></li>
                <li class="md:mr-14 mt-3 md:mt-0"><a href="#" class="hover:bg-white hover:text-blue-700 hover:font-bold rounded-2xl px-3 py-1">Top Rated</a></li>
            </ul>
        </div>

    </div>
</nav>
