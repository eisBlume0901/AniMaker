@extends('layout')

@section('title', 'Login Page')
@section('content')
    <form action="/users/authenticate" method="POST" enctype="multipart/form-data"
          class="m-5 p-10 w-full max-w-xl mx-auto overflow-hidden bg-white rounded-2xl shadow-blue-700 shadow-md hover:shadow-emerald-400 transition ease-in-out duration-150">

        @csrf

        <div class="flex m-2 flex-row justify-center align-middle">
            <div class="flex m-2 flex-col justify-center align-middle">
                <h1 class="font-bold leading-tight tracking-tight text-xl">Login your account</h1>
            </div>
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

        <div class="mb-8">
            <label for="password" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Password</label>
            <input type="password" name="password" id="password"
                   class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                   value="{{old('password')}}">

            @error('password')
            <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-8 block">
            <button
                type="submit"
                class="px-4 py-2 text-base font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-700 rounded-2xl hover:bg-emerald-400">
                Login
            </button>
        </div>
        <span class="block">
                Don't have an account?
                <a href="/signup" class="text-blue-700 hover:text-emerald-400">Signup</a>
        </span>
    </form>
@endsection
