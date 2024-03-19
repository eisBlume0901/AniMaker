@extends('partials.header')

@section('content')
    <div class="anime-info border-b border-blue-700">
        <div class="mx-auto px-16 py-16 flex flex-col sm:flex-col md:flex-col lg:flex-row">
            <img src="{{$anime->image}}" alt="{{$anime->title}} image" class="rounded-2xl sm:w-60 mx-auto md:w-72 lg:w-80"/>
            <div class="mx-auto sm:ml-16">
                <h2 class="text-3xl font-semibold mt-3 sm:mt-3 md:mt-3 lg:mt-0">{{$anime->title}}</h2>
                <div class="stats flex flex-col text-blue-700 text-sm mt-2">
                    <span class="font-semibold">Start Aired Date: </span>
                    @php
                        $date = date_create_from_format('Y-m-d', $anime->start_aired_date);
                        $formattedDate = $date->format('M d, Y');
                    @endphp
                    <span class="mx-1">{{$formattedDate}}</span>
                    <span class="">Genres: </span>
                    <div class="flex flex-row">
                        @foreach($anime->genres as $genre)
                            <span class="mt-0">{{$genre->genre}}</span>
                            @if(!$loop->last)
                                <span class="mx-1">,</span>
                            @endif
                        @endforeach
                    </div>
                </div>
                <p class="text-blue-700 mt-8">
                    {{$anime->description}}
                </p>
            </div>
        </div>
    </div>
@endsection
