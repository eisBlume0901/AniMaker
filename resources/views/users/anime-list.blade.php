@extends('layout')
@section('title', 'Manage Animes')
@section('content')
    @include('partials.adminManageAnimeNavBar')
    @if(count($animes) > 0)
        @foreach($animes as $anime)
            <x-anime-manage-card :specificAnime="$anime"/>
        @endforeach
    @endif
    <div class="mt-5 p-5 text-blue-700">
        {{ $animes->links() }}
    </div>
@endsection
