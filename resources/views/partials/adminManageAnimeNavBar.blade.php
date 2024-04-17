<nav class="bg-blue-700 text-white">
    <div class="max-w-screen-3xl flex flex-wrap items-center justify-between mx-auto px-20 py-4">

        @livewire('search')

        <div class="flex md:flex-row sm:flex-col gap-x-20">
            <a href="/anime/create" target="_blank" class="hover:text-emerald-400">Create Anime</a>
            {{--            Still have to put the route and its controller--}}
            <a href="/animes/manage" class="hover:text-emerald-400">Manage Animes</a>
        </div>

    </div>
</nav>
