@extends('layout')
@section('title', 'Manage Animes')
@section('content')
    @include('partials.adminManageAnimeNavBar')
    <div class="flex flex-col lg:max-w-screen-3xl md:max-w-screen-2xl sm:max-w-screen-sm mx-auto mt-10">
        @if(count($animes) > 0)
            @foreach($animes as $anime)
                <x-anime-manage-card :specificAnime="$anime"/>
            @endforeach
        @endif
    </div>

    <div class="mt-5 p-5 text-blue-700">
        {{ $animes->links() }}
    </div>
@endsection
