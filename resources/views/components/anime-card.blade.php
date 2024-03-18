@props(['specificAnime'])
    <div class="card mt-8">
        <a href="#">
            <img src="{{$specificAnime->image}}" alt="" class="rounded-2xl shadow-blue-700 shadow-md hover:opacity-75 hover:shadow-emerald-400 transition ease-in-out duration-150">
        </a>
        <div class="">
            <div class="mt-3 font-bold text-blue-700">
                <a href="#">{{$specificAnime->title}}</a>
            </div>
        </div>
        <div class="stats flex flex-row items-center text-blue-700 mt-1">
            <span class="">Score:</span>
            <span class="ml-1">9.13</span>
            <span class="mx-2">|</span>
            @php
                $date = date_create_from_format('Y-m-d', $specificAnime->start_aired_date);
                $formattedDate = $date->format('M d, Y');
            @endphp
            <span>{{$formattedDate}}</span>
        </div>
        @foreach($specificAnime->genres as $genre)
            <span class="">{{$genre->genre}}</span>
            @if(!$loop->last)
                <span class="mx-2">|</span>
            @endif
        @endforeach
        <div class="sm:text-xs ">
            <button class="rounded-2xl bg-blue-700 text-white px-3 py-1.5 mt-2 font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-blue-400 active:bg-emerald-400">Add to List</button>
        </div>
    </div>
