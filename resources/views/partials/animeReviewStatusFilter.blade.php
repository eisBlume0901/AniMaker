<div class="my-10 mx-24 flex flex-row justify-center gap-x-5">
    <div class="px-4 py-2.5 w-60 items-center flex rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
        <div class="flex flex-row gap-x-2.5 mx-auto text-center text-blue-700 text-lg hover:text-emerald-400 hover:font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
            </svg>
{{--            The request parameter is included with the URL.--}}
{{--            The reason why the request parameter is included with the URL is to filter the reviews based on the review status.--}}
{{--            This is helpful if you are using different SQL queries to filter the reviews based on the review status.--}}
            <a href="{{ route('show_anime', ['animeToBeShown' => $anime->id, 'reviewStatus' => 'Recommended']) }}" class="">Recommended</a>
        </div>
    </div>
    <div class="px-4 py-2.5 w-60 items-center flex rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
        <div class="flex flex-row gap-x-2.5 mx-auto text-center text-blue-700 text-lg hover:text-emerald-400 hover:font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
            </svg>
            <a href="{{ route('show_anime', ['animeToBeShown' => $anime->id, 'reviewStatus' => 'Not Recommended']) }}" class="">Not Recommended</a>
        </div>
    </div>
    <div class="px-4 py-2.5 w-60 items-center flex rounded-2xl shadow-md shadow-blue-700 hover:shadow-emerald-400 transition ease-in-out duration-150">
        <div class="flex flex-row gap-x-2.5 mx-auto text-center text-blue-700 text-lg hover:text-emerald-400 hover:font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
            </svg>
            <a href="{{ route('show_anime', ['animeToBeShown' => $anime->id, 'reviewStatus' => 'Mixed Feelings']) }}" class="">Mixed Feelings</a>
        </div>
    </div>
</div>
