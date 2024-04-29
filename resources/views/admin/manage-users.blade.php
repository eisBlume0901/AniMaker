@extends('layout')
@section('title', 'Manage Users')
@section('content')
    @include('partials.adminManageUserNavBar')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 max-w-screen-xl mx-auto text-md my-6">
        @if(count($users) > 0)
            @foreach($users as $user)
                <x-user-manage-card :specificUser="$user"/>
            @endforeach
        @endif
    </div>
    <div class="mt-5 p-5 text-blue-700">
        {{ $users->links() }}
    </div>


@endsection
