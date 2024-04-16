@extends('layout')

@section('title', 'Edit Anime')
@section('content')
    @include('partials.adminManageAnimeNavBar')
    <form action="/anime/{{$anime->id}}" method="POST" enctype="multipart/form-data"
          class="m-5 p-5 w-full max-w-3xl mx-auto overflow-hidden bg-white rounded-2xl shadow-blue-700 shadow-md hover:shadow-emerald-400 transition ease-in-out duration-150">

        @csrf

        @method('PUT')

        <div class="flex m-2 flex-row justify-center align-middle">
            <div class="flex m-2 flex-col justify-center align-middle">
                <h1 class="font-semibold">Edit anime details</h1>
            </div>
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-2">
            <div class="mb-6">
                <div class="flex flex-col items-center mt-2">
                    <div class="w-60 h-72 mb-2 overflow-hidden rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400">
                        <img id='preview_img' class="w-full h-full object-cover"
                             src="{{$anime->image ? asset('storage/' .$anime->image) : asset('images/no-image-1.png')}}"
                             alt="Current profile photo" />
                    </div>

                    <input
                        type="file"
                        name="image"
                        onchange="loadFile(event)"
                        class="w-60 mt-6 text-sm text-blue-700 border border-blue-100 rounded-2xl cursor-pointer bg-blue-50 hover:bg-emerald-50 hover:text-emerald-400" >

                </div>

                <script>
                    let loadFile = function(event) {

                        let input = event.target;
                        let file = input.files[0];
                        let type = file.type;

                        let output = document.getElementById('preview_img');


                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src) // free memory
                        }
                    };
                </script>

                @error('image')
                <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                @enderror

            </div>



            <div class="grid-cols-3">

                <div class="mb-6">
                    <label for="title" class="block text-blue-700 text-md font-semibold mb-2 ml-2 my-0.5">Title</label>
                    <input type="text" name="title" id="title"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           placeholder="Frieren Beyond Journey's End" value="{{$anime->title}}">

                    @error('title')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="episodes" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Episodes</label>
                    <input type="number" name="episodes" id="episodes" min="1"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{$anime->episodes}}"
                           placeholder="24" >

                    @error('episodes')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="studio" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Studio</label>
                    <input type="text" name="studio" id="studio"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           placeholder="Madhouse" value="{{$anime->studio}}">

                    @error('studio')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-x-2">

                    <div class="mb-6">
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
                            <input datepicker datepicker-autohide type="text" id="start_aired_date" name="start_aired_date" class="ps-10 bg-blue-50 block w-full px-4 py-2 mt-2 border border-blue-100 shadow-md shadow-blue-50 text-blue-700 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                                   placeholder="mm/dd/yyyy" value="{{ \Carbon\Carbon::parse($anime->start_aired_date)->format('m/d/Y') }}"/>

                            @error('start_aired_date')
                            <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
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
                            <input datepicker datepicker-autohide type="text" id="end_aired_date" name="end_aired_date" class="ps-10 bg-blue-50 block w-full px-4 py-2 mt-2 border border-blue-100 shadow-md shadow-blue-50 text-blue-700 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                                   placeholder="mm/dd/yyyy" value="{{ \Carbon\Carbon::parse($anime->end_aired_date)->format('m/d/Y') }}"/>

                            @error('end_aired_date')
                            <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="mb-6">
            <label for="description" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Description</label>
            <textarea name="description" id="description" rows="8"
                      class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                      placeholder="This is the story of ..."
            >
              {{$anime->description}}
            </textarea>

            @error('description')
            <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="genres" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Genres</label>
            <div id="dropdownSearch" class="grid sm:grid-cols-2 md:grid-cols-3 gap-x-4">
                @foreach($genres as $genre)
                    <div class="flex items-center px-5 py-2 rounded-2xl hover:bg-blue-50 active:bg-emerald-50">
                        <input id="{{$genre->genre}}" name="genre_id[]" type="checkbox" value="{{$genre->id}}"
                               class="w-4 h-4 text-emerald-400 focus:ring-emerald-400 bg-blue-100 border-blue-100 rounded"
                               @if($anime->genres->contains($genre->id)) checked @endif>
                        <label for="{{$genre->genre}}"
                               class="w-full ms-2 text-md font-medium text-blue-700 rounded">{{$genre->genre}}</label>
                    </div>
                @endforeach
                @error('genre_id')
                <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div class="mt-6 flex min-w-full justify-center">
            <button class="px-4 py-2 text-base font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-700 rounded-2xl hover:bg-emerald-400">
                Update Anime
            </button>
        </div>

    </form>
@endsection



