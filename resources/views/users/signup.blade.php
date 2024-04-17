@extends('layout')

@section('title', 'Sign Up Page')
@section('content')
    <form action="/users" method="POST" enctype="multipart/form-data"
          class="m-5 p-10 w-full max-w-xl mx-auto overflow-hidden bg-white rounded-2xl shadow-blue-700 shadow-md hover:shadow-emerald-400 transition ease-in-out duration-150">

        @csrf

        <div class="flex m-2 flex-row justify-center align-middle">
            <div class="flex m-2 flex-col justify-center align-middle">
                <h1 class="font-bold leading-tight tracking-tight text-xl">Create your account</h1>
            </div>
        </div>


            <div class="mb-6">
                <label for="image" class="block text-blue-700 text-md font-semibold mb-2 ml-2 text-center">Profile Picture</label>
                <div class="flex flex-col items-center mt-2">
                    <div class="w-40 h-40 mb-2 overflow-hidden rounded-full shadow-md shadow-blue-700 hover:shadow-emerald-400">
                        <img id='preview_img' class="w-full h-full object-cover"
                             src="{{asset('images/no-image-2.png')}}" alt="Current profile photo" />
                    </div>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        onchange="loadFile(event)"
                        value="{{old('image')}}"
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


                <div class="mb-6">
                    <label for="name" class="block text-blue-700 text-md font-semibold mb-2 ml-2 my-0.5">Username</label>
                    <input type="text" name="name" id="name"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{old('name')}}">

                    @error('name')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Email</label>
                    <input type="email" name="email" id="email"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{old('email')}}"
                    >

                    @error('email')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Password</label>
                    <input type="password" name="password" id="password"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{old('password')}}">

                    @error('password')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="password_confirmation" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Confirmed Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{old('password_confirmation')}}">

                    @error('password_confirmation')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

        <div class="mb-6 block">
            <button
                type="submit"
                class="px-4 py-2 text-base font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-700 rounded-2xl hover:bg-emerald-400">
                Signup
            </button>
        </div>
        <span>
                Already have an account?
                <a href="/login" class="text-blue-700 hover:text-emerald-400">Login</a>
        </span>
    </form>
@endsection
