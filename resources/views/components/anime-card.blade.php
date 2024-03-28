@props(['specificAnime'])
<div class="card mt-8 relative">

    <a href="/anime/{{$specificAnime->id}}">
        <img src="{{$specificAnime->image}}" alt="{{$specificAnime->title}} image"
             class="rounded-2xl shadow-blue-700 shadow-md hover:opacity-75 hover:shadow-emerald-400 transition ease-in-out duration-150">
    </a>
    <div class="absolute z-1 -top-4 -right-2">
        <button class="add-button rounded-full bg-blue-700 text-white text-2xl px-2.5 mt-2 font-bold uppercase leading-normal transition duration-150 ease-in-out hover:bg-blue-400 active:bg-emerald-400">
            +
        </button>

        <script>
            const HTMLString = `
          <ul class="text-sm text-blue-700">
            <li class="hover:bg-blue-700 hover:text-white hover:font-bold rounded-2xl p-1.5 active:bg-emerald-400">
                <div class="flex-center items-center">
                    <input id="currently-watching" type="radio" style="-webkit-appearance: none">
                    <label for="currently-watching" class="p-2">Currently Watching</label>
                </div>
            </li>
            <li class="hover:bg-blue-700 hover:text-white hover:font-bold rounded-2xl p-1.5 active:bg-emerald-400">
                <div class="flex-center items-center">
                    <input id="completed" type="radio" style="-webkit-appearance: none">
                    <label for="completed" class="p-2">Completed</label>
                </div>
            </li>
            <li class="hover:bg-blue-700 hover:text-white hover:font-bold rounded-2xl p-1.5 active:bg-emerald-400">
                <div class="flex-center items-center">
                    <input id="on-hold" type="radio" style="-webkit-appearance: none">
                    <label for="on-hold" class="p-2">On Hold</label>
                </div>
            </li>
            <li class="hover:bg-blue-700 hover:text-white hover:font-bold rounded-2xl p-1.5 active:bg-emerald-400">
                <div class="flex-center items-center">
                    <input id="dropped" type="radio" style="-webkit-appearance: none">
                    <label for="dropped" class="p-2">Dropped</label>
                </div>
            </li>
            <li class="hover:bg-blue-700 hover:text-white hover:font-bold rounded-2xl p-1.5 active:bg-emerald-400">
                <div class="flex-center items-center">
                    <input id="plan-to-watch" type="radio" style="-webkit-appearance: none">
                    <label for="plan-to-watch" class="p-2">Plan to Watch</label>
                </div>
            </li>
        </ul>
`;
            document.addEventListener('DOMContentLoaded', (event) => {
                document.body.addEventListener('click', function(e) {
                    if(e.target && e.target.classList.contains('add-button')) {
                        let watchStatusDropDown = e.target.nextElementSibling;
                        if (!watchStatusDropDown || !watchStatusDropDown.classList.contains('watch-status-dropdown')) {
                            watchStatusDropDown = document.createElement("div");
                            watchStatusDropDown.className = "watch-status-dropdown";
                            watchStatusDropDown.innerHTML = HTMLString;
                            watchStatusDropDown.classList.add("w-44", "bg-white", "shadow-lg", "shadow-blue-700", "ring-1", "ring-black", "ring-opacity-5", "focus:outline-none", "hidden", "p-2", "rounded-lg");
                            e.target.insertAdjacentElement('afterend', watchStatusDropDown);
                        }
                        watchStatusDropDown.classList.toggle("hidden");
                    }
                });
            });
        </script>

    </div>
    <div class="">
        <div class="mt-3 font-bold text-blue-700">
            <a href="#">{{$specificAnime->title}}</a>
        </div>
    </div>
    <div class="w-50 h-3 stats flex flex-row items-center text-blue-700 mt-1 content-center">
        <span class="">Score:</span>
        <span class="ml-1">9.13</span>
        <span class="mx-1">|</span>
        @php
            $date = date_create_from_format('Y-m-d', $specificAnime->start_aired_date);
            $formattedDate = $date->format('M d, Y');
        @endphp
        <span>{{$formattedDate}}</span>
    </div>
    <div class="w-50 content-center mt-1 {{ count($specificAnime->genres) > 3 ? 'h-10' : 'h-5' }}">
        @foreach($specificAnime->genres as $genre)
            <span class="mt-0">{{$genre->genre}}</span>
            @if(!$loop->last)
                <span class="mx-1">|</span>
            @endif
        @endforeach
    </div>
</div>
