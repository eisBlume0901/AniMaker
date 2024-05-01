@props(['userAnime'])
<div class="mx-auto mt-2 py-2 px-10 lg:max-w-screen-xl md:max-w-screen-lg sm:max-w-screen-md">

    <div class="flex flex-col lg:flex-row items-center p-5 mb-8 text-md rounded-3xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">

        <div class="px-5 py-2 lg:my-0">
            <div class="rounded-2xl overflow-hidden w-36 h-60 shadow-md shadow-blue-700 hover:opacity-75 hover:shadow-emerald-400 transition ease-in-out duration-150">
                <a href="{{route('show_anime', ['animeToBeShown' => $userAnime->id])}}">
                    <img alt="{{$userAnime->title}} image" class="w-full h-full object-cover" src="{{$userAnime->image ? asset('storage/' .$userAnime->image) : asset('images/no-image-1.png')}}">
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-y-0 w-full">

                <div class="flex flex-row justify-end my-1">

                    <div class="grid grid-cols-2 gap-x-2">
                        <a href="{{route('edit_review', ['animeToBeReviewed' => $userAnime->id])}}">
                            <button id="edit-button" type="button" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                        </a>
                        <form action="{{route('destroy_review', ['animeToBeReviewed' => $userAnime->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="delete-button" type="submit" class="text-white bg-blue-700 hover:bg-gradient-to-br hover:from-emerald-400 hover:to-blue-700 transition ease-in-out duration-150 focus:ring-4 font-medium rounded-3xl text-sm p-2 text-center inline-flex items-center me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

            <div class="flex flex-col mb-2">
                <div class="flex justify-start">
                    <span class="font-bold text-2xl">
                        <a href="{{route('show_anime', ['animeToBeShown' => $userAnime->id])}}">
                            {{$userAnime->title}}
                        </a>
                    </span>
                </div>
            </div>

            <div class="flex flex-row gap-y-0 -mx-1">

                @if(!isset($userAnime->watchStatus))
                    <span class="m-2 text-sm">Watch Status: <span class="font-bold">Not watched yet</span></span>
                @else
                    <span class="m-2 text-sm">Watch Status: <span class="font-bold">{{$userAnime->watchStatus}}</span></span>
                @endif


                @if(!isset($userAnime->progress))
                    <span class="m-2 text-sm">Progress: <span class="font-bold">0 out of {{$userAnime->episodes}}</span></span>
                @else
                    <span class="m-2 text-sm">Progress: <span class="font-bold">{{$userAnime->progress}} out of {{$userAnime->episodes}}</span></span>
                @endif

                @if(!isset($userAnime->rating))
                    <span class="m-2 text-sm">Rating: <span class="font-bold">Not rated yet</span></span>
                @else
                    <span class="m-2 text-sm">Rating: <span class="font-bold">{{$userAnime->rating}}</span></span>
                @endif

                @if(!isset($userAnime->reviewStatus))
                    <span class="m-2 text-sm">Review Status: <span class="font-bold">Not reviewed yet</span></span>
                @else
                    <span class="m-2 text-sm">Review Status: <span class="font-bold">{{$userAnime->reviewStatus}}</span></span>
                @endif


            </div>

            <div class="text-sm text-justify p-0.5">

                @if(str_word_count($userAnime->review) > 100)
                    {{implode(' ', array_slice(explode(' ', $userAnime->review), 0, 100))}}...
                @else
                    {{$userAnime->review}}
                @endif

            </div>

            </div>
        </div>

    </div>


