@extends('layout')
@section('title', 'Manage Animes')
@section('content')
    @include('partials.adminManageAnimeNavBar')
    @include('animes.list')
    <div class="mt-5 p-5">
        {{$animes->render()}}
    </div>
@endsection
