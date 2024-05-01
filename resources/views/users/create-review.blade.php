@extends('layout')
@section('title', 'Create User Review Form')
@section('content')
    @include('partials.animeNavBar')
    <form action="{{route('update_review', ['animeToBeReviewed' => $anime->id])}}" method="POST" enctype="multipart/form-data"
          class="m-5 p-5 w-full max-w-screen-lg mx-auto overflow-hidden bg-white rounded-2xl shadow-blue-700 shadow-md hover:shadow-emerald-400 transition ease-in-out duration-150">

        @csrf
        @method('PUT')


        <div class="flex m-2 flex-row justify-center align-middle">
            <div class="flex m-2 flex-col justify-center align-middle">
                <h1 class="font-semibold">Create a review about the anime you've watched!</h1>
            </div>
        </div>

        <div class="flex flex-row gap-x-10 w-full px-10">

            <div class="flex flex-col">
                <div class="mb-6">
                    <div class="flex flex-col items-center mt-2">
                        <div
                            class="w-48 h-72 mb-2 overflow-hidden rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400">
                            <a href="{{route('show_anime', ['animeToBeShown' => $anime->id])}}">
                                <img class="w-full h-full object-cover"
                                     src="{{$anime->image ? asset('storage/' .$anime->image) : asset('images/no-image-1.png')}}" alt="{{$anime->title}} image"/>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <a href="{{route('show_anime', ['animeToBeShown' => $anime->id])}}">
                        <label for="title" class="text-center block text-blue-700 text-md font-semibold mb-2 ml-2 my-0.5">{{$anime->title}}</label>
                    </a>
                </div>
            </div>



            <div class="flex flex-col w-full mt-2">

{{--                Remove min and max values from the input fields--}}
                <div class="mb-6">
                    <label for="progress" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Progress</label>
                    <input type="number" name="progress" id="progress"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{$anime->progress}}"
                           placeholder="24">

                    @error('progress')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="watchStatus" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Watch Status</label>
                    <select name="watchStatus" id="watchStatus" class="bg-blue-50 border border-blue-100 shadow-md shadow-blue-50 text-blue-700 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50 block w-full p-2.5">
                        <option value="" selected>Choose your anime's watch status</option>

                        @if($anime->watchStatus == 'Currently Watching')
                            <option value="Currently Watching" selected>Currently Watching</option>
                        @else
                            <option value="Currently Watching">Currently Watching</option>
                        @endif

                        @if($anime->watchStatus == 'Completed')
                            <option value="Completed" selected>Completed</option>
                        @else
                            <option value="Completed">Completed</option>
                        @endif

                        @if($anime->watchStatus == 'On-Hold')
                            <option value="On-Hold" selected>On-Hold</option>
                        @else
                            <option value="On-Hold">On-Hold</option>
                        @endif

                        @if($anime->watchStatus == 'Dropped')
                            <option value="Dropped" selected>Dropped</option>
                        @else
                            <option value="Dropped">Dropped</option>
                        @endif

                        @if($anime->watchStatus == 'Plan to Watch')
                            <option value="Plan to Watch" selected>Plan to Watch</option>
                        @else
                            <option value="Plan to Watch">Plan to Watch</option>
                        @endif

                        @if($anime->watchStatus == 'Rewatched')
                            <option value="Rewatched" selected>Rewatched</option>
                        @else
                            <option value="Rewatched">Rewatched</option>
                        @endif

                    </select>
                </div>

                <div class="mb-6">

                    <label for="rating" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Rating</label>
                    <input type="number" name="rating" id="rating" step="0.01"
                           class="w-full px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
                           value="{{$anime->rating}}"
                           placeholder="9.18">

                    @error('rating')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="reviewStatus" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Review Status</label>
                    <ul class="items-center w-full text-md font-medium text-blue-700 bg-blue-50 border border-blue-100 shadow-md shadow-blue-50 rounded-2xl hover:ring-emerald-400 hover:border-emerald-400 hover:text-emerald-700 hover:bg-emerald-50 sm:flex">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                            <div class="flex items-center ps-3">

                                @if($anime->reviewStatus == 'Recommended')
                                    <input id="horizontal-list-radio-license" type="radio" value="Recommended" name="reviewStatus" class="w-4 h-4 text-emerald-400 bg-white border-2 border-blue-100 focus:ring-emerald-400 focus:ring-2" checked>
                                @else
                                    <input id="horizontal-list-radio-license" type="radio" value="Recommended" name="reviewStatus" class="w-4 h-4 text-emerald-400 bg-white border-2 border-blue-100 focus:ring-emerald-400 focus:ring-2">
                                @endif

                                <label for="horizontal-list-radio-license" class="w-full py-3 ms-2">Recommended</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                            <div class="flex items-center ps-3">

                                @if($anime->reviewStatus == 'Not Recommended')
                                    <input id="horizontal-list-radio-id" type="radio" value="Not Recommended" name="reviewStatus" class="w-4 h-4 text-emerald-400 bg-white border-2 border-blue-100 focus:ring-emerald-400 focus:ring-2" checked>
                                @else
                                    <input id="horizontal-list-radio-id" type="radio" value="Not Recommended" name="reviewStatus" class="w-4 h-4 text-emerald-400 bg-white border-2 border-blue-100 focus:ring-emerald-400 focus:ring-2">
                                @endif

                                <label for="horizontal-list-radio-id" class="w-full py-3 ms-2">Not Recommended</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                            <div class="flex items-center ps-3">

                                @if($anime->reviewStatus == 'Mixed Feelings')
                                    <input id="horizontal-list-radio-military" type="radio" value="Mixed Feelings" name="reviewStatus" class="w-4 h-4 text-emerald-400 bg-white border-2 border-blue-100 focus:ring-emerald-400 focus:ring-2" checked>
                                @else
                                    <input id="horizontal-list-radio-military" type="radio" value="Mixed Feelings" name="reviewStatus" class="w-4 h-4 text-emerald-400 bg-white border-2 border-blue-100 focus:ring-emerald-400 focus:ring-2">
                                @endif

                                <label for="horizontal-list-radio-military" class="w-full py-3 ms-2">Mixed Feelings</label>
                            </div>
                        </li>
                    </ul>

                    @error('reviewStatus')
                    <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
                    @enderror
                </div>



            </div>

        </div>


        <div class="mb-6">
            <label for="description" class="block text-blue-700 text-md font-semibold mb-2 ml-2">Review</label>
            <textarea name="review" id="review" rows="8"
                      class="w-full indent-0 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl focus:ring-emerald-400 focus:border-emerald-400 focus:text-emerald-700 focus:bg-emerald-50"
            >
                {{$anime->review}}
            </textarea>

            @error('review')
            <p class="text-red-500 text-sm mx-3 my-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6 flex min-w-full justify-center">
            <button
                type="submit"
                class="px-4 py-2 text-base font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-700 rounded-2xl hover:bg-emerald-400">
                Create Review
            </button>
        </div>
    </form>
@endsection
