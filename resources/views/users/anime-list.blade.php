@extends('layout')
@section('title', 'Manage Animes')
@section('content')
    @include('partials.animeNavBar')
    @include('partials.animeWatchStatusFilter')
    @forelse($userAnimes as $anime)
        <x-user-anime-manage-card :userAnime="$anime"/>
    @empty
        <div class="text-center text-blue-700 text-xl my-5">
            No animes with <span class="font-semibold">{{request('watchStatus') ?? 'any'}}</span> watch status
        </div>
    @endforelse


@endsection
