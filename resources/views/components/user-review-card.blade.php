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

                @if(!isset($reviewInfo->watchStatus))
                    <span class="m-2 text-sm">Watch Status: <span class="font-bold">Not watched yet</span></span>
                @else
                    <span class="m-2 text-sm">Watch Status: <span class="font-bold">{{$reviewInfo->watchStatus}}</span></span>
                @endif


                @if(!isset($reviewInfo->progress))
                    <span class="m-2 text-sm">Progress: <span class="font-bold">0 out of {{$animeInfo->episodes}}</span></span>
                @else
                    <span class="m-2 text-sm">Progress: <span class="font-bold">{{$reviewInfo->progress}} out of {{$animeInfo->episodes}}</span></span>
                @endif


                @if(!isset($reviewInfo->rating))
                    <span class="m-2 text-sm">Rating: <span class="font-bold">Not rated yet</span></span>
                @else
                    <span class="m-2 text-sm">Rating: <span class="font-bold">{{$reviewInfo->rating}}</span></span>
                @endif

                @if(!isset($reviewInfo->reviewStatus))
                    <span class="m-2 text-sm">Review Status: <span class="font-bold">Not reviewed yet</span></span>
                @else
                    <span class="m-2 text-sm">Review Status: <span class="font-bold">{{$reviewInfo->reviewStatus}}</span></span>
                @endif


            </div>

            <div class="text-sm text-justify p-0.5">

                @if(str_word_count($reviewInfo->review) > 100)
                    <span id="dots">{{implode(' ', array_slice(explode(' ', $reviewInfo->review), 0, 100))}}...</span>
                    <span id="more" style="display: none;">{{substr($reviewInfo->review, 100)}}</span>
                    <button id="moreButton" onclick="toggleReadMore()" class="cursor-pointer font-bold hover:text-emerald-400 hover:font-bold">Read More</button>
                @else
                    <span>{{$reviewInfo->review}}</span>
                @endif

                <script>
                    function toggleReadMore() {
                        const dots = document.getElementById("dots");
                        const moreText = document.getElementById("more");
                        const btnText = document.getElementById("moreButton");

                        if (dots.style.display === "none") {
                            dots.style.display = "inline"; // Changed from "none" to "inline"
                            btnText.innerHTML = "Read More";
                            moreText.style.display = "none";
                        } else {
                            dots.style.display = "none"; // Changed from "inline" to "none"
                            btnText.innerHTML = "Read Less";
                            moreText.style.display = "inline"; // Changed from "none" to "inline"
                        }
                    }
                </script>

            </div>

        </div>
    </div>

</div>


