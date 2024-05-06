<div class="my-10 mx-24 flex flex-row justify-center gap-x-5">
    <div class="px-4 py-2.5 w-60 items-center flex rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
        <div class="flex flex-row gap-x-2.5 mx-auto text-center text-blue-700 text-lg hover:text-emerald-400 hover:font-bold">
            {{--            The request parameter is included with the URL.--}}
            {{--            The reason why the request parameter is included with the URL is to filter the reviews based on the review status.--}}
            {{--            This is helpful if you are using different SQL queries to filter the reviews based on the review status.--}}
            <a href="{{ route('show_anime_list', ['watchStatus' => 'Currently Watching']) }}">Currently Watching</a>
        </div>
    </div>
    <div class="px-4 py-2.5 w-60 items-center flex rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
        <div class="flex flex-row gap-x-2.5 mx-auto text-center text-blue-700 text-lg hover:text-emerald-400 hover:font-bold">
            <a href="{{ route('show_anime_list', ['watchStatus' => 'Completed']) }}">Completed</a>
        </div>
    </div>
    <div class="px-4 py-2.5 w-60 items-center flex rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
        <div class="flex flex-row gap-x-2.5 mx-auto text-center text-blue-700 text-lg hover:text-emerald-400 hover:font-bold">
            <a href="{{ route('show_anime_list', ['watchStatus' => 'On-Hold']) }}">On-Hold</a>
        </div>
    </div>
    <div class="px-4 py-2.5 w-60 items-center flex rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
        <div class="flex flex-row gap-x-2.5 mx-auto text-center text-blue-700 text-lg hover:text-emerald-400 hover:font-bold">
            <a href="{{ route('show_anime_list', ['watchStatus' => 'Dropped']) }}">Dropped</a>
        </div>
    </div>
    <div class="px-4 py-2.5 w-60 items-center flex rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
        <div class="flex flex-row gap-x-2.5 mx-auto text-center text-blue-700 text-lg hover:text-emerald-400 hover:font-bold">
            <a href="{{ route('show_anime_list', ['watchStatus' => 'Plan to Watch']) }}">Plan to Watch</a>
        </div>
    </div>
    <div class="px-4 py-2.5 w-60 items-center flex rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
        <div class="flex flex-row gap-x-2.5 mx-auto text-center text-blue-700 text-lg hover:text-emerald-400 hover:font-bold">
            <a href="{{ route('show_anime_list', ['watchStatus' => 'Rewatched']) }}">Rewatched</a>
        </div>
    </div>
</div>
