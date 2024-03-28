@extends('layout')

@section('content')
    <form action="/anime" method="POST" class="m-5 p-5 w-full max-w-2xl mx-auto overflow-hidden bg-white rounded-2xl shadow-blue-700 shadow-md hover:shadow-emerald-400 transition ease-in-out duration-150">

        @csrf

        <div class="flex m-2 flex-row justify-center align-middle">
            <div class="flex m-2 flex-col justify-center align-middle">
                <h1 class="font-semibold">Add new anime to the database</h1>
            </div>
        </div>

        <div class="mb-6">
            <label for="title" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Title</label>
            <input type="text" name="title" id="title"
                   class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                   placeholder="Frieren Beyond Journey's End" >

            @error('title')
                <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">
            <label for="episodes" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Episodes</label>
            <input type="number" name="episodes" id="episodes" min="1"
                   class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                   placeholder="24" >

            @error('episodes')
            <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">
            <label for="episodes" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Studio</label>
            <input type="text" name="studio" id="studio"
                   class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                   placeholder="Madhouse" >

            @error('studio')
            <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">
            <label for="description" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Description</label>
            <textarea name="description" id="description" rows="6"
                      class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                      placeholder="This is the story of ..." ></textarea>

            @error('description')
            <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">
            <label for="image" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Image</label>
            <input type="text" name="image" id="description"
                   class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                   placeholder="https://cdn.myanimelist.net/images/anime/1015/138006l.jpg">

            @error('image')
            <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">
            <label for="genres" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Genres</label>

            <div id="dropdownSearch" class="grid sm:grid-cols-2 md:grid-cols-3 gap-x-4">
                @foreach($genres as $genre)
                    <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                        <input id="{{$genre->genre}}" name="genre_id[]" type="checkbox" value="{{$genre->id}}"
                               class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded">
                        <label for="{{$genre->genre}}"
                               class="w-full ms-2 text-md font-medium text-blue-700 rounded">{{$genre->genre}}</label>
                    </div>
                @endforeach
                @error('genre_id')
                <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-x-4">
                <div class="my-6">
                    <label for="start_aired_date" class="block text-blue-700 mb-2 ml-2 text-md font-semibold">Start Aired
                        Date</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-blue-700 focus:text-emerald-700" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" id="start_aired_date" name="start_aired_date" class="ps-10 bg-blue-50 block w-full px-4 py-2 mt-2 border border-blue-100 shadow-md shadow-blue-50 text-blue-700 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50" placeholder="mm/dd/yyyy"/>

                        @error('start_aired_date')
                        <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="my-6">
                    <label for="end_aired_date" class="block text-blue-700 mb-2 ml-2 text-md font-semibold">End Aired
                        Date</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-blue-700 focus:text-emerald-700" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" id="end_aired_date" name="end_aired_date" class="ps-10 bg-blue-50 block w-full px-4 py-2 mt-2 border border-blue-100 shadow-md shadow-blue-50 text-blue-700 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50" placeholder="mm/dd/yyyy"/>

                        @error('end_aired_date')
                        <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
            </div>


            <div class="mt-6 flex min-w-full justify-center">
                <button class="px-4 py-2 text-base font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-700 rounded-2xl hover:bg-emerald-400">
                    Add Anime
                </button>
            </div>

    </form>
@endsection



