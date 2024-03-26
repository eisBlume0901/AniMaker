@extends('partials.header')

@section('content')
    <form action="/anime" method="POST" class="max-w-xl mx-auto mt-5">
        @csrf
        <div class="mb-5">
            <label for="title" class="block mb-2 text-2xl font-medium text-blue-700">Title</label>
            <input type="text" id="title" name="title" class="block w-full p-4 text-blue-700 border border-blue-300 rounded-lg bg-blue-50 text-base focus:ring-emerald-500 focus:border-emerald-500">
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-2xl font-medium text-blue-700">Description</label>
            <textarea id="description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-blue-50 rounded-lg border border-blue-300 focus:ring-blue-500 focus:border-blue-500"></textarea>

        </div>
    </form>
@endsection


