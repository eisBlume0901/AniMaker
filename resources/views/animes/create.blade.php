@extends('layout')

@section('content')
    <form action="/anime" method="POST"
          class="m-10 p-10 w-full max-w-lg mx-auto overflow-hidden bg-white rounded-2xl shadow-blue-700 shadow-md hover:shadow-emerald-400 transition ease-in-out duration-150">
        @csrf
        <div class="flex m-2 flex-row justify-center align-middle">
            <div class="flex m-2 flex-col justify-center align-middle">
                <h1 class="font-semibold">Add new anime to the database</h1>
            </div>
        </div>

        <div class="mb-6">
            <label for="title" class="block text-blue-700 text-md font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title"
                   class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                   placeholder="Frieren Beyond Journey's End" required>
        </div>

        <div class="mb-6">
            <label for="episodes" class="block text-blue-700 text-md font-semibold mb-2">Episodes</label>
            <input type="number" name="episodes" id="episodes" min="1"
                   class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                   placeholder="24" required>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-blue-700 text-md font-semibold mb-2">Description</label>
            <textarea name="description" id="description" rows="6"
                      class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                      placeholder="This is the story of ..." required></textarea>
        </div>

        <div class="mb-6">
            <label for="image" class="block text-blue-700 text-md font-semibold mb-2">Image</label>
            <input type="text" name="image" id="description"
                   class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                   placeholder="https://cdn.myanimelist.net/images/anime/1015/138006l.jpg">
        </div>

        <div class="mb-6">
            <label for="genres" class="block text-blue-700 text-md font-semibold mb-2">Genres</label>
            <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-4 py-2 text-md font-medium text-center text-white bg-blue-700 transition-colors ease-in-out duration-150 rounded-2xl hover:bg-emerald-400" type="button"> Select Genres
                <svg class="w-2.5 h-2.5 ms-2.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <div id="dropdownSearch" class="z-10 hidden bg-white rounded-2xl shadow shadow-emerald-400 w-52 p-2">
                <ul class="h-48 overflow-y-auto text-md text-blue-700">
                    <li>
                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="action" name="genre_id" type="checkbox" value="1"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="action"
                                   class="w-full ms-2 text-md font-medium text-blue-700 rounded">Action</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="adventure" name="genre_id" type="checkbox" value="2"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="adventure" class="w-full ms-2 text-md font-medium text-blue-700 rounded">Adventure</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="avant_garde" name="genre_id" type="checkbox" value="3"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="avant_garde" class="w-full ms-2 text-md font-medium text-blue-700 rounded">Avant
                                Garde</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="comedy" name="genre_id" type="checkbox" value="4"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="comedy"
                                   class="w-full ms-2 text-md font-medium text-blue-700 rounded">Comedy</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="drama" name="genre_id" type="checkbox" value="5"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="drama"
                                   class="w-full ms-2 text-md font-medium text-blue-700 rounded">Drama</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="fantasy" name="genre_id" type="checkbox" value="6"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="fantasy"
                                   class="w-full ms-2 text-md font-medium text-blue-700 rounded">Fantasy</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="horror" name="genre_id" type="checkbox" value="7"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="horror"
                                   class="w-full ms-2 text-md font-medium text-blue-700 rounded">Horror</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="mystery" name="genre_id" type="checkbox" value="8"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="mystery"
                                   class="w-full ms-2 text-md font-medium text-blue-700 rounded">Mystery</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="romance" name="genre_id" type="checkbox" value="9"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="romance"
                                   class="w-full ms-2 text-md font-medium text-blue-700 rounded">Romance</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="sci_fi" name="genre_id" type="checkbox" value="10"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="sci_fi"
                                   class="w-full ms-2 text-md font-medium text-blue-700 rounded">Sci-Fi</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="slice_of_life" name="genre_id" type="checkbox" value="11"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="slice_of_life" class="w-full ms-2 text-md font-medium text-blue-700 rounded">Slice
                                of Life</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="sports" name="genre_id" type="checkbox" value="12"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="sports"
                                   class="w-full ms-2 text-md font-medium text-blue-700 rounded">Sports</label>
                        </div>

                        <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                            <input id="supernatural" name="genre_id" type="checkbox" value="13"
                                   class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                            <label for="supernatural" class="w-full ms-2 text-md font-medium text-blue-700 rounded">Supernatural</label>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="my-6">
                <label for="start_aired_date" class="block text-blue-700 mb-2 text-md font-semibold">Start Aired
                    Date</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-blue-700 focus:text-emerald-700" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide type="text"
                           class="ps-10 bg-blue-50 block w-full px-4 py-2 mt-2 border border-blue-100 shadow-md shadow-blue-50 text-blue-700 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           required>
                </div>
            </div>

        </div>
    </form>
@endsection



