@props(['specificAnime'])

<div class="flex flex-col">
    <div class="flex flex-col">
        <div class="flex justify-end top-8 left-8 lg:top-8 lg:left-4 md:top-6 md:left-6 sm:top-6 sm:left-2 relative z-10">
            <a href="{{route('store_review', ['animeToBeReviewed' => $specificAnime->id])}}">
                <button id="add-button" type="button" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2.5 text-center inline-flex items-center me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                </button>
            </a>
        </div>

        <div class="flex justify-center z-0">
            <div class="w-full h-full lg:w-72 lg:h-96 md:w-64 md:h-72 sm:w-60 sm:h-72 overflow-hidden rounded-2xl shadow-md shadow-blue-700 hover:opacity-75 hover:shadow-emerald-400 transition ease-in-out duration-150">
                <a href="{{route('show_anime', ['animeToBeShown' => $specificAnime->id])}}">
                    <img src="{{$specificAnime->image ? asset('storage/' .$specificAnime->image) : asset('images/no-image-1.png')}}"
                         alt="{{$specificAnime->title}} image"
                         class="w-full h-full">
                </a>
            </div>

        </div>
    </div>
    <div class="flex justify-center sm:justify-start md:justify-start lg:justify-start">
        <p class="mt-3 lg:mt-3 md:mb-1 md:mt-3 sm:mb-1 sm:mt-3 font-bold text-blue-700">
            {{$specificAnime->title}}
        </p>
    </div>

    <div class="flex justify-center sm:justify-start md:justify-start lg:justify-start">
        <div class="w-50 h-3 stats flex-row items-center text-blue-700 mt-1 lg:mt-1 md:mb-1 sm:mb-1 content-center">
            <span class="">Score:</span>
            <span class="ml-1">9.13</span>
            <span class="mx-1">|</span>
            @php
                $date = date_create_from_format('Y-m-d', $specificAnime->start_aired_date);
                $formattedDate = $date->format('M d, Y');
            @endphp
            <span>{{$formattedDate}}</span>
        </div>
    </div>

    <div class="flex justify-center sm:justify-start md:justify-start lg:justify-start">
        <div class="w-50 content-center mt-1 lg:mt-1 md:mt-2 sm:mt-2 {{ count($specificAnime->genres) > 3 ? 'h-10' : 'h-5' }}">
            @foreach($specificAnime->genres as $genre)
                <span class="mt-0">{{$genre->genre}}</span>
                @if(!$loop->last)
                    <span class="mx-1">|</span>
                @endif
            @endforeach
        </div>
    </div>

</div>





