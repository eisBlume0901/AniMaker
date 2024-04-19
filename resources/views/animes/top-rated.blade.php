@extends('layout')
@section('title', 'Top Rated Animes')
@section('content')
    @include('partials.animeNavBar')

    @foreach($animes as $anime)
        <div class="mx-auto my-4 py-2 px-10 lg:max-w-screen-lg md:max-w-screen-md sm:max-w-screen-sm overflow-hidden">
            <div class="flex md:flex-row lg:flex-row items-center p-3.5 my-2 text-md rounded-3xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
                <div class="text-3xl text-blue-700 font-bold">
                    {{--                Has to change to anime ranking--}}
                    {{$loop->iteration}}
                </div>

                <div class="px-5 py-2 lg:my-0 mb-4">
                    <div class="rounded-2xl overflow-hidden w-20 h-32 shadow-md shadow-blue-700 hover:opacity-75 hover:shadow-emerald-400 transition ease-in-out duration-150">
                        <a href="/anime/{{$anime->id}}">
                            <img alt="{{$anime->title}} image" class="w-full h-full object-cover" src="{{$anime->image ? asset('storage/' .$anime->image) : asset('images/no-image-1.png')}}">
                        </a>
                    </div>
                </div>

                <div class="flex flex-col px-5">

                    <div class="flex flex-col w-full mb-2">
                        <div class="flex justify-start">
                            <span class="font-bold text-2xl">
                                <a href="/anime/{{$anime->id}}">
                                    {{$anime->title}}
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-row my-1.5 -mx-1">
                        @foreach($anime->genres as $genre)
                            <span class="text-white py-0.5 px-2.5 bg-blue-700 rounded-full mx-1 text-sm ">
                                <a href="/?genre={{$genre->genre}}">
                                    {{$genre->genre}}
                                </a>
                        </span>
                        @endforeach
                    </div>

                    <div class="flex flex-row my-1.5 -mx-1">
                        <span class="m-2 text-sm">{{$anime->episodes}} Episodes</span>
                        <span class="m-2 text-sm">Studio {{$anime->studio}}</span>
                        @php
                            $date = date_create_from_format('Y-m-d', $anime->start_aired_date);
                            $formattedStartDate = $date->format('M d, Y');
                        @endphp
                        <span class="m-2 text-sm">Started at
                            {{$formattedStartDate}}
                        </span>

                        @php
                            $date = date_create_from_format('Y-m-d', $anime->end_aired_date);
                            $formattedEndDate = $date->format('M d, Y');
                        @endphp
                        <span class="m-2 text-sm">Ended at
                            {{$formattedEndDate}}
                        </span>

                    </div>
                </div>

            </div>

        </div>
    @endforeach


@endsection
