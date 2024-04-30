@props(['specificAnime'])
<div class="mx-20 mt-2 py-2 px-10 lg:max-w-screen-3xl md:max-w-screen-2xl sm:max-w-screen-sm">

    <div class="flex flex-col lg:flex-row items-center p-5 mb-8 text-md rounded-3xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">

        <div class="px-5 py-2 lg:my-0 mb-4">
            <div class="rounded-2xl overflow-hidden w-48 h-80 sm:w-32 sm:h-40 md:w-48 md:h-80 lg:w-48 lg:h-80 shadow-md shadow-blue-700 hover:opacity-75 hover:shadow-emerald-400 transition ease-in-out duration-150">
                <img alt="{{$specificAnime->title}} image" class="w-full h-full object-cover" src="{{$specificAnime->image ? asset('storage/' .$specificAnime->image) : asset('images/no-image-1.png')}}">
            </div>
        </div>

        <div class="flex flex-col px-5">
            <div class="flex flex-col gap-x-10">
                <div class="flex justify-end w-full my-1">
                    <div class="grid grid-cols-2 gap-x-2">

                        @role('admin')
                        <a href="{{route('edit_anime', ['animeToBeEdited' => $specificAnime->id])}}">
                            <button id="edit-button" type="button" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                        </a>
                        <form action="{{route('destroy_anime', ['animeToBeDestroyed' => $specificAnime->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="delete-button" type="submit" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                        @endrole

                        @role('user')
                        <a href="{{route('edit_anime', ['animeToBeEdited' => $specificAnime->id])}}">
                            <button id="edit-button" type="button" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                        </a>
                        <form action="{{route('destroy_anime', ['animeToBeDestroyed' => $specificAnime->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="delete-button" type="submit" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                        @endrole

                    </div>
                </div>
            </div>


            <div class="flex flex-col w-full mb-2">
                <div class="flex justify-start">
                    <span class="font-bold text-2xl">
                        {{$specificAnime->title}}
                    </span>
                </div>
            </div>

            <div class="flex flex-row my-1.5 -mx-1">
                @foreach($specificAnime->genres as $genre)
                    <span class="text-white py-0.5 px-2.5 bg-blue-700 rounded-full mx-1 text-sm">
                        {{$genre->genre}}
                    </span>
                @endforeach
            </div>
            <div class="flex flex-row my-1.5 -mx-1">
                <span class="m-2 text-sm">{{$specificAnime->episodes}} Episodes</span>
                <span class="m-2 text-sm">Studio {{$specificAnime->studio}}</span>
                @php
                    $date = date_create_from_format('Y-m-d', $specificAnime->start_aired_date);
                    $formattedStartDate = $date->format('M d, Y');
                @endphp
                <span class="m-2 text-sm">Started at
                    {{$formattedStartDate}}
                </span>

                @php
                    $date = date_create_from_format('Y-m-d', $specificAnime->end_aired_date);
                    $formattedEndDate = $date->format('M d, Y');
                @endphp
                <span class="m-2 text-sm">Ended at
                    {{$formattedEndDate}}
                </span>
            </div>
            <div class="text-sm text-justify p-0.5">
                {{$specificAnime->description}}
            </div>
        </div>

    </div>

</div>

