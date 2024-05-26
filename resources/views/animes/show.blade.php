@extends('layout')

@section('title', 'Anime Details')
@section('content')
    @include('partials.animeNavBar')
    <div class="anime-info border-b border-blue-700">
        <div class="mx-auto px-20 py-16 flex flex-col sm:flex-col md:flex-col lg:flex-row">
            <img src="{{$anime->image ? asset('storage/' .$anime->image) : asset('images/no-image-1.png')}}" alt="{{$anime->title}} image"
                 class="rounded-2xl shadow-md shadow-blue-700 sm:w-60 mx-auto md:w-72 lg:w-80"/>

            <div class="sm:mx-auto sm:mt-6 md:mx-auto md:mt-6 lg:mt-6 lg:ml-16">
                <div class="flex flex-col sm:flex-col md:flex-row lg:flex-row space-x-5">
                    <div>
                        <h2 class="text-4xl font-semibold mt-3 sm:mt-3 md:mt-3 lg:mt-0">{{$anime->title}}</h2>
                    </div>



                    <div class="buttons flex flex-row justify-end space-x-2">

                        <a href="{{route('store_review', ['animeToBeReviewed' => $anime->id])}}">
                            <button id="add-button" type="button" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2.5 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </button>
                        </a>

                        @role('admin')

                        <a href="{{route('edit_anime', ['animeToBeEdited' => $anime->id])}}">

                            <button id="edit-button" type="button" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2.5 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                        </a>

                        <form action="{{route('destroy_anime', ['animeToBeDestroyed' => $anime->id])}}" method="POST">

                            @csrf
                            @method('DELETE')
                            <button id="delete-button" type="submit" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2.5 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>

                        @endrole

                    </div>


                </div>


                <div class="flex flex-col text-blue-700 text-md mt-6">

                    <div class="grid sm:grid-rows-1 md:grid-cols-2 lg:grid-cols-2 gap-x-28">

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


                    </div>

                </div>
                <div>
                    <p class="text-blue-700 mt-8 text-justify mr-6 l-2">
                        {{$anime->description}}
                    </p>
                </div>

            </div>
        </div>
    </div>


    @include('partials.animeReviewStatusFilter')
    @forelse($reviewInfos as $review)
        <div class="mx-auto my-1.5 py-2 px-10 lg:max-w-screen-2xl md:max-w-screen-xl sm:max-w-screen-lg">
            <x-user-review-card :reviewInfo="$review" :animeInfo="$anime"/>
        </div>
    @empty
        <div class="text-center text-blue-700 text-xl my-5">
            No reviews yet
        </div>
    @endforelse

@endsection
