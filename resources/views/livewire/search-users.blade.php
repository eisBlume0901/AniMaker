<div>
    <label for="search-bar">
        <input
            id="search-bar"
            wire:model.live="search"
            type="text"
            class="text-md text-blue-700 rounded-full w-48 px-2 pl-4 py-1 sm:gap-y-1.5 focus:outline-none focus:shadow-outline" placeholder="Search User"

        >
    </label>
    @if(strlen($search) > 0)
        <div class="absolute z-10 mt-2.5 w-80 px-4 block rounded-2xl bg-white text-blue-700 shadow-md shadow-blue-400 hover:shadow-emerald-400">
            @if(sizeof($userResults) > 0)
                @foreach($userResults as $user)
                    <a href="{{route('edit_user', ['userToBeEdited' => $user->id])}}">
                        <div class="flex flex-row items-center gap-x-2 px-3 py-2.5 transition ease-in-out duration-150 hover:text-emerald-400 hover:opacity-75">
                            <div class="w-12 h-12 rounded-full overflow-hidden">
                                <img src="{{$user->image ? asset('storage/' .$user->image) : asset('images/no-image-1.png')}}"
                                     alt="{{$user->name}}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col">
                                <div class="text-md">{{$user->name}}</div>
                                <div class="text-md">{{$user->email}}</div>
                            </div>
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
