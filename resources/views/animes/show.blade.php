@extends('layouts.main')

@section('content')
    <div class="mx-auto px-16 py-16 flex max-w-full">
                <img src="{{$anime->image ? asset('storage/' .$anime->image) : asset('images/no-image-1.png')}}" alt="{{$anime->title}} image" alt="{{$anime->title}}" class="w-80">
                <div class="ml-20 flex flex-col">
                    <div class = "flex flex-row align-middle justify-between">
                        <div>
                            <h2 class="text-4xl font-semibold">{{$anime->title}}</h2>
                            <div class="stats flex items-center text-blue-700 text-sm">
                            </div>
                            <div class="flex-row mt-4">
                                @foreach($anime->genres as $genre)
                                    <a href="" class="text-blue-700 m-3">{{$genre->genre}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <div class="flex-row m-10">
                                <button type="button" class="w-full mt-4 px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl hover:ring-emerald-400 hover:border-emerald-400 hover:text-emerald-700 hover:bg-emerald-50 transition ease-in-out duration-150" x-on:click.prevent="$refs.photo.click()">Add to List</button>
                                <button type="button" class="w-full mt-4 px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl hover:ring-emerald-400 hover:border-emerald-400 hover:text-emerald-700 hover:bg-emerald-50 transition ease-in-out duration-150" x-on:click.prevent="$refs.photo.click()">Update</button>
                                <button type="button" class="w-full mt-4 px-3 py-2 text-blue-700 border border-blue-100 bg-blue-50 shadow-md shadow-blue-50 text-md rounded-2xl hover:ring-emerald-400 hover:border-emerald-400 hover:text-emerald-700 hover:bg-emerald-50 transition ease-in-out duration-150" x-on:click.prevent="$refs.photo.click()">Delete</button>
                            </div>
                        </div>
                    </div>  
                    <div class = "flex flex-col justify-between">
                            <div class = "flex flex-row text-center text-xl"> Air Span: 
                                @php
                                    $startdate = date_create_from_format('Y-m-d', $anime->start_aired_date);
                                    $formattedDate = $startdate->format('M d, Y');
                                @endphp
                                {{$$formattedstartDate}} - 
                                @php
                                    $enddate = date_create_from_format('Y-m-d', $anime->end_aired_date);
                                    $formattedendDate = $startdate->format('M d, Y');
                                @endphp
                                {{$$formattedendDate}} </span> </div> 
                            <div class = "flex flex-row text-center text-xl"> Episodes: {{$anime->episodes}} </span> </div> 
                            <div class = "flex flex-row text-center text-xl"> Studio: {{$anime->studio}} </span> </div>
                        </div>
                    <p class="text-blue-700 mt-8 text-xl">
                    {{$anime->description}}
                    </p>
                </div>
            </div>


@endsection
