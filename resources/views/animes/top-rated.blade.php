@extends('layout')
@section('title', 'Top Rated Animes')
@section('content')
    @include('partials.animeNavBar')

    @foreach($animes as $anime)
        <div class="mx-auto my-4 py-2 px-10 lg:max-w-screen-lg md:max-w-screen-md sm:max-w-screen-sm overflow-hidden">
            <div class="flex flex-col sm:flex-row md:flex-row lg:flex-row items-center p-3.5 my-2 text-md rounded-3xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
                <div class="text-3xl text-blue-700 font-bold">
                    {{$loop->iteration}}
                </div>

                <div class="px-5 py-2 lg:my-0 mb-4">
                    <div class="rounded-2xl overflow-hidden w-20 h-32 shadow-md shadow-blue-700 hover:opacity-75 hover:shadow-emerald-400 transition ease-in-out duration-150">
                        <a href="{{route('show_anime', ['animeToBeShown' => $anime->anime_id])}}">
                            <img alt="{{$anime->anime_title}} image" class="w-full h-full object-cover" src="{{$anime->anime_image ? asset('storage/' .$anime->anime_image) : asset('images/no-image-1.png')}}">
                        </a>
                    </div>
                </div>

                <div class="flex flex-col w-full px-5">

                    <div class="flex flex-col w-full mb-2">
                        <div class="flex justify-start">
                            <span class="font-bold text-2xl">
                                <a href="{{route('show_anime', ['animeToBeShown' => $anime->anime_id])}}">
                                    {{$anime->anime_title}}
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-row w-full items-center justify-between">
                        <div class="flex flex-row my-1.5 -mx-1">

                            @php
                                $genres = explode(',', $anime->anime_genre); // replace ',' with your actual delimiter
                            @endphp

                            @foreach($genres as $genre)
                                <span class="text-white py-0.5 px-2.5 bg-blue-700 rounded-full mx-1 text-sm ">
                                <a href="{{route('index', ['genre' => $genre])}}">
                                    {{$genre}}
                                </a>
                            </span>
                            @endforeach

                        </div>

                        <div class="flex justify-end gap-x-4">

                            <div class="flex flex-row items-center gap-x-2 text-blue-700">

                                @if($anime->average_rating >= 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                    </svg>
                                    {{$anime->average_rating}}
                                @endif
                            </div>

                            <div class="flex flex-row items-center gap-x-2 text-blue-700">

                                @if($anime->users_count >= 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                                    </svg>
                                    {{$anime->users_count}}
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="flex flex-col sm:flex-row md:flex-row lg:flex-row my-1.5 -mx-1">
                        <span class="m-2 text-sm">{{$anime->anime_episodes}} Episodes</span>
                        <span class="m-2 text-sm">Studio {{$anime->anime_studio}}</span>
                        @php
                            $date = date_create_from_format('Y-m-d', $anime->anime_start_aired_date);
                            $formattedStartDate = $date->format('M d, Y');
                        @endphp
                        <span class="m-2 text-sm">Started at
                            {{$formattedStartDate}}
                        </span>

                        @php
                            $date = date_create_from_format('Y-m-d', $anime->anime_end_aired_date);
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
