@extends('layout')

@section('title', 'Edit User')
@section('content')
    @include('partials.adminManageUserNavBar')
    <form action="{{route('update_user', ['userToBeUpdated' => $user->id]) }}" method="POST" enctype="multipart/form-data"
          class="mt-10 w-full max-w-screen-md mx-auto overflow-hidden bg-white rounded-2xl shadow-blue-700 shadow-md hover:shadow-emerald-400 transition ease-in-out duration-150">

        @csrf

        @method('PUT')

        <div class="flex m-2 flex-row justify-center align-middle w-full">
            <div class="flex m-2 flex-col justify-center align-middle">
                <h1 class="font-semibold">Edit user details</h1>
            </div>
        </div>

        <div class="flex flex-row sm:flex-col md:flex-row lg:flex-row gap-x-6 items-center justify-center content-center w-full p-5">
            <div class="mb-6">
                <div class="flex flex-col items-center mt-2">
                    <div class="w-48 h-48 rounded-full mb-2 overflow-hidden shadow-md shadow-blue-700 hover:shadow-emerald-400">
                        <img id='preview_img' class="w-full h-full object-cover"
                             src="{{$user->image ? asset('storage/' .$user->image) : asset('images/no-image-1.png')}}"
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



            <div class="flex flex-col flex-wrap w-full">

                <div class="mb-6">
                    <label for="name" class="block text-blue-700 text-md font-semibold mb-2 ml-2 my-0.5">Username</label>
                    <input type="text" name="name" id="name"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{$user->name}}">

                    @error('name')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Email</label>
                    <input type="email" name="email" id="email"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{$user->email}}"
                           placeholder="24" >

                    @error('email')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6">
{{--                    Change the data matching the data--}}

                    @php
                        $counts = $user->getUserCounts($user->id);
                    @endphp

                    <div class="mb-6">

                        <label for="number_of_animes" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Number of Animes</label>
                        <div id="number_of_animes"
                             class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50">
                            {{$counts['anime_count']}}
                        </div>
                    </div>

{{--                    Change the data matching the data--}}
                    <div class="mb-6">
                        <label for="number_of_reviews" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Number of Reviews</label>
                        <div id="number_of_reviews"
                             class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50">
                            {{$counts['review_count']}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mb-6 flex min-w-full justify-center">
            <button class="px-4 py-2 text-base font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-700 rounded-2xl hover:bg-emerald-400">
                Update User
            </button>
        </div>

    </form>
@endsection



