@props(['reviewInfo', 'animeInfo'])
<div class="mx-auto mt-2 py-2 px-10 lg:max-w-screen-xl md:max-w-screen-lg sm:max-w-screen-md">

    <div class="flex flex-col lg:flex-row items-center p-8 mb-8 text-md rounded-3xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">

        <div class="flex flex-col gap-y-0 w-full">

            <div class="flex flex-row items-center gap-x-2.5 py-2.5">
                <div>
                    <img src="{{$reviewInfo->user_image ? asset('storage/' .$reviewInfo->user_image) : asset('images/no-image-1.png')}}" alt="{{$reviewInfo->user_name}} image"
                         class="rounded-full shadow-md shadow-blue-700 w-16 h-16 lg:w-20 lg:h-20
                            hover:shadow-emerald-400 transition ease-in-out duration-150" />
                </div>
                <span class="text-2xl font-semibold mt-3">{{$reviewInfo->user_name}}</span>


            </div>

            <div class="flex flex-row gap-y-0 -mx-1">

                @if(!isset($reviewInfo->user_watch_status))
                    <span class="m-2 text-sm">Watch Status: <span class="font-bold">Not watched yet</span></span>
                @else
                    <span class="m-2 text-sm">Watch Status: <span class="font-bold">{{$reviewInfo->user_watch_status}}</span></span>
                @endif


                @if(!isset($reviewInfo->user_progress))
                    <span class="m-2 text-sm">Progress: <span class="font-bold">0 out of {{$animeInfo->episodes}}</span></span>
                @else
                    <span class="m-2 text-sm">Progress: <span class="font-bold">{{$reviewInfo->user_progress}} out of {{$reviewInfo->episodes}}</span></span>
                @endif

                @if(!isset($reviewInfo->user_rating))
                    <span class="m-2 text-sm">Rating: <span class="font-bold">Not rated yet</span></span>
                @else
                    <span class="m-2 text-sm">Rating: <span class="font-bold">{{$reviewInfo->user_rating}}</span></span>
                @endif

                @if(!isset($reviewInfo->user_review_status))
                    <span class="m-2 text-sm">Review Status: <span class="font-bold">Not reviewed yet</span></span>
                @else
                    <span class="m-2 text-sm">Review Status: <span class="font-bold">{{$reviewInfo->user_review_status}}</span></span>
                @endif


            </div>

            <div class="text-sm text-justify p-0.5">

                @if(str_word_count($reviewInfo->user_review) > 100)
                    {{implode(' ', array_slice(explode(' ', $reviewInfo->user_review), 0, 100))}}...
                @else
                    {{$reviewInfo->user_review}}
                @endif

            </div>

        </div>
    </div>

</div>


