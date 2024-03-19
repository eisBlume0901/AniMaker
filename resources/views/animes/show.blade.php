@extends('partials.header')

@section('content')
    <div class="anime-info border-b border-blue-700">
        <div class="mx-auto px-16 py-16 flex sm:flex-row">
            <img src="{{$anime->image}}" alt="{{$anime->title}} image" />
            <div class="ml-20">
                <h2 class="text-2xl font-semibold">{{$anime->title}}</h2>
                <div class="stats flex items-center text-blue-700 text-sm">
                    <span class="">Score:</span>
                    <span class="ml-1">9.13</span>
                    <span class="mx-2">|</span>
                    @php
                        $date = date_create_from_format('Y-m-d', $anime->start_aired_date);
                        $formattedDate = $date->format('M d, Y');
                    @endphp
                    <span>{{$formattedDate}}</span>
                    <span class="mx-2">|</span>
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
