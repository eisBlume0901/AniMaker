<div>
    <label for="search-bar">
        <input
            id="search-bar"
            wire:model.live="search"
            type="text"
            class="text-md text-blue-700 rounded-full w-48 px-2 pl-4 py-1 sm:gap-y-1.5 focus:outline-none focus:shadow-outline" placeholder="Search Anime"

        >
    </label>
    @if(strlen($search) > 0)
        <div class="absolute z-40 mt-2.5 w-96 px-4 block rounded-2xl bg-white text-blue-700 shadow-md shadow-blue-400 hover:shadow-emerald-400">
            @if(sizeof($animeResults) > 0)
                @foreach($animeResults as $anime)
                    <a href="/anime/{{$anime->id}}">
                        <div class="flex flex-row items-center gap-x-2 px-3 pt-2 transition ease-in-out duration-150 hover:text-emerald-400 hover:opacity-75">
                            <div class="w-10 h-16 overflow-hidden">
                                <img src="{{$anime->image ? asset('storage/' .$anime->image) : asset('images/no-image-1.png')}}"
                                     alt="{{$anime->title}}" class="w-full rounded-md object-cover">
                            </div>
                            <div class="text-md">{{$anime->title}}</div>
                        </div>
                    </a>
                    @if(!$loop->last)
                        <hr class="border-b-blue-700">
                    @endif
                @endforeach
            @else
                <div class="flex flex-row items-center gap-x-2 px-3 pt-2 transition ease-in-out duration-150 hover:text-emerald-400 hover:opacity-75">
                    <div class="text-md mb-2">No results found</div>
                </div>
            @endif
        </div>
    @endif
</div>
