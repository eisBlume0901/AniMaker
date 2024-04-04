@extends('layout')

@section('content')
    @include('partials.animeNavBar')
    <div class="anime-info border-b border-blue-700">
        <div class="mx-auto px-16 py-16 flex flex-col sm:flex-col md:flex-col lg:flex-row">
                <img src="{{$anime->image ? asset('storage/' .$anime->image) : asset('images/no-image-1.png')}}" alt="{{$anime->title}} image"
                     class="rounded-2xl shadow-md shadow-blue-700 sm:w-60 mx-auto md:w-72 lg:w-80"/>

            <div class="mx-auto sm:ml-16">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 space-y-2.5">
                    <div>
                        <h2 class="text-3xl font-semibold mt-3 sm:mt-3 md:mt-3 lg:mt-0">{{$anime->title}}</h2>
                    </div>
                    <div class="buttons flex flex-row">
                        <button id="edit-button" type="button" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2.5 text-center inline-flex items-center me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button id="edit-button" type="button" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2.5 text-center inline-flex items-center me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="stats flex flex-col text-blue-700 text-sm mt-6">

                    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-28">


                        <div class="container flex flex-col">
                             <span class="font-semibold">Start Aired Date:
                                @php
                                    $date = date_create_from_format('Y-m-d', $anime->start_aired_date);
                                    $formattedDate = $date->format('M d, Y');
                                @endphp
                            <span class="font-normal">{{$formattedDate}}</span></span>

                                <span class="font-semibold">End Aired Date:
                                @php
                                    $date = date_create_from_format('Y-m-d', $anime->end_aired_date);
                                    $formattedDate = $date->format('M d, Y');
                                @endphp
                            <span class="font-normal">{{$formattedDate}}</span></span>

                                <span class="font-semibold">Genres:
                                @foreach($anime->genres as $genre)
                                        <span class="font-normal">{{$genre->genre}}</span>
                                        @if(!$loop->last)
                                            <span class="">, </span>
                                        @endif
                                    @endforeach
                            </span>

                                <span class="font-semibold">Episodes:
                                <span class="font-normal">{{$anime->episodes}}</span>
                            </span>

                                <span class="font-semibold">Studio:
                                <span class="font-normal">{{$anime->studio}}</span>
                            </span>
                        </div>

                        <div class="container">
                            Score
                        </div>

                    </div>



                </div>
                <p class="text-blue-700 mt-8">
                    {{$anime->description}}
                </p>
            </div>
        </div>
    </div>
@endsection
