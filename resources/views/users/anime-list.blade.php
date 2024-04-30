@extends('layout')
@section('title', 'Manage Animes')
@section('content')
    @include('partials.animeNavBar')
    @if(count($userAnimes) > 0)
        @foreach($userAnimes  as $anime)
            <x-user-anime-manage-card :userAnime="$anime"/>
        @endforeach
    @endif

@endsection
