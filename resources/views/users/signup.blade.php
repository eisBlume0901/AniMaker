@extends('layout')

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
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                    <input type="file" name="image" id="image" class="hidden" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);">
                    <div class="text-center">
                        <div class="mt-2" x-show="! photoPreview">
                            <img src="{{asset('images/no-image-2.png')}}" class="object-contain w-40 h-40 my-3.5 mx-auto rounded-2xl shadow-md shadow-blue-700"/>
                        </div>
{{--                        <div class="mt-2" x-show="photoPreview" style="display: none;">--}}
{{--                             <span class="object-cover w-40 h-40 block my-3.5 mx-auto rounded-2xl shadow-md shadow-emerald-400" x-bind:style="'object-fit: contain; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-image: url('null');">--}}
{{--                             </span>--}}
{{--                        </div>--}}
                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                            <div class="object-cover w-40 h-40 block my-3.5 mx-auto rounded-2xl shadow-md shadow-emerald-400" x-bind:style="'object-fit: cover, background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="object-fit: cover; background-repeat: no-repeat; background-image: url('null');">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="max-w-screen-xl w-full mt-4 px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl hover:ring-emerald-400 hover:border-emerald-400 hover:text-emerald-700 hover:bg-emerald-50 transition ease-in-out duration-150" x-on:click.prevent="$refs.photo.click()">
                        Upload Your Profile
                    </button>
                </div>
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

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Confirmed Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{old('password_confirmation')}}">

                    @error('password_confirmation')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

        <div class="my-6 block gap-x-4">
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
