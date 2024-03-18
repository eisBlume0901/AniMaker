@props(['specificAnime'])
    <div class="card mt-8 relative">
        <a href="#">
            <img src="{{$specificAnime->image}}" alt="" class="rounded-2xl shadow-blue-700 shadow-md hover:opacity-75 hover:shadow-emerald-400 transition ease-in-out duration-150">
        </a>
        <div class="absolute z-1 -top-4 -right-2">
            <button class="rounded-full bg-blue-700 text-white text-2xl px-2.5 mt-2 font-bold uppercase leading-normal transition duration-150 ease-in-out hover:bg-blue-400 active:bg-emerald-400">
                +
            </button>
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
