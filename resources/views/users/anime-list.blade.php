@extends('layout')
@section('title', 'Manage Animes')
@section('content')
    @include('partials.animeNavBar')
    @if(count($userAnimes) > 0)
        @foreach($userAnimes  as $anime)
            <x-user-anime-manage-card :userAnime="$anime"/>
        @endforeach
    @else
        <div class="flex justify-center mt-10">
            <span class="text-2xl">No animes found</span>
        </div>
    @endif

@endsection
