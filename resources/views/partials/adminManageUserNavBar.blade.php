<nav class="bg-blue-700 text-white">
    <div class="max-w-screen-3xl flex flex-wrap items-center justify-between mx-auto px-20 py-4">

        @livewire('search-users')

        <div class="flex flex-row gap-x-20">
{{--            Change to route('create_user')--}}
            <a href="{{route('create_user')}}" class="hover:text-emerald-400">Create User</a>
            <a href="{{route('manage_users')}}" class="hover:text-emerald-400">Manage Users</a>
        </div>

    </div>
</nav>
