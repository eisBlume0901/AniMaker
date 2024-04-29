@extends('layout')

@section('title', 'Home Page')
@section('content')
    @include('partials.animeNavBar')
    <div class="md:ml-16 md:mr-16 p-5">

            <div
                class="grid grid-cols-1 sm:grid-cols-2 sm:text-sm md:grid-cols-3 md:text-md lg:grid-cols-5 gap-8 text-md">
                @if(count($animes) > 0)
                    @foreach($animes as $anime)
                        <x-anime-card :specificAnime="$anime"/>
                    @endforeach
                @endif
            </div>
            @if(count($animes) == 0)
                <div class="text-center text-blue-700 text-xl  mt-5">
                    No animes found
                </div>
            @endif

    </div>
    <div class="mt-5 p-5">
        {{$animes->links()}}
    </div>
@endsection
