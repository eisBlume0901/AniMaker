@extends('layout')

@section('title', 'Anime Details')
@section('content')
    @include('partials.animeNavBar')
    <div class="anime-info border-b border-blue-700">
        <div class="mx-auto px-16 py-16 flex flex-col sm:flex-col md:flex-col lg:flex-row">
                <img src="{{$anime->image ? asset('storage/' .$anime->image) : asset('images/no-image-1.png')}}" alt="{{$anime->title}} image"
                     class="rounded-2xl shadow-md shadow-blue-700 sm:w-60 mx-auto md:w-72 lg:w-80"/>

            <div class="sm:mx-auto sm:mt-6 md:mx-auto md:mt-6 lg:mt-6 lg:ml-16">
                <div class="flex flex-col sm:flex-col md:flex-row lg:flex-row space-x-5">
                    <div>
                        <h2 class="text-4xl font-semibold mt-3 sm:mt-3 md:mt-3 lg:mt-0">{{$anime->title}}</h2>
                    </div>

{{--                    Admin is the only one who should access these buttons--}}
                    <div class="buttons flex flex-row justify-end space-x-2">
                        <a href="/anime/{{$anime->id}}/edit">
                            <button id="edit-button" type="button" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2.5 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                        </a>

                        <form action="/anime/{{$anime->id}}" method="POST">
                            @csrf
                            @method('DELETE')
{{--                            Type of button should be submit because it is a form--}}
                            <button id="delete-button" type="submit" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2.5 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>

                    </div>
                </div>
{{--                    Admin is the only one who should access these buttons--}}
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


                        <div class="flex flex-col mr-6">

                            <div class="container flex flex-row justify-end align-middle items-center text-blue-700 text-5xl font-bold my-1.5">
                                Rank 1
                            </div>

                            <div class="container flex flex-row justify-end align-middle items-center gap-x-3 my-1.5">
                                <div class="text-blue-700 border-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="text-blue-700 font-bold text-3xl">9.18</div>
                            </div>

                        </div>

                    </div>

                </div>
                <p class="text-blue-700 mt-8 text-justify mr-6 l-2">
                    {{$anime->description}}
                </p>
            </div>
        </div>
    </div>
@endsection
