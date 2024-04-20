@extends('layout')

@section('title', 'Edit Anime')
@section('content')
    @include('partials.adminManageAnimeNavBar')
    <form action="/user/{{$user->id}}" method="POST" enctype="multipart/form-data"
          class="m-5 p-5 w-full max-w-3xl mx-auto overflow-hidden bg-white rounded-2xl shadow-blue-700 shadow-md hover:shadow-emerald-400 transition ease-in-out duration-150">

        @csrf

        @method('PUT')

        <div class="flex m-2 flex-row justify-center align-middle">
            <div class="flex m-2 flex-col justify-center align-middle">
                <h1 class="font-semibold">Edit user details</h1>
            </div>
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-2">
            <div class="mb-6">
                <div class="flex flex-col items-center mt-2">
                    <div class="w-60 h-72 mb-2 overflow-hidden rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400">
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



            <div class="grid-cols-3">

                <div class="mb-6">
                    <label for="name" class="block text-blue-700 text-md font-semibold mb-2 ml-2 my-0.5">Name</label>
                    <input type="text" name="title" id="name"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           placeholder="Frieren Beyond Journey's End" value="{{$user->name}}">

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



            </div>
        </div>





        <div class="mt-6 flex min-w-full justify-center">
            <button class="px-4 py-2 text-base font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-700 rounded-2xl hover:bg-emerald-400">
                Update User
            </button>
        </div>

    </form>
@endsection



