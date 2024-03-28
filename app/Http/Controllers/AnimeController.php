<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AnimeController extends Controller
{
    //
    public function create(): View
    {
        return view('animes/create',
            [
                'genres' => Genre::all()
            ]);
    }

    public function store(Request $request): View
    {
        $formFields = $request->validate([
            'title' => 'required',
            'episodes' => ['required', 'integer', 'min:1'],
            'studio' => 'required',
            'description' => ['required', Rule::unique('table_animes', 'description')],
            'image' => ['required', 'url'],
            'start_aired_date' => 'required|date_format:m/d/Y',
            'end_aired_date' => 'required|date_format:m/d/Y',
            'genre_id' => 'required|array',
        ]);

        $formFields['start_aired_date'] = Carbon::createFromFormat('m/d/Y', $request->start_aired_date)->format('Y-m-d');
        $formFields['end_aired_date'] = Carbon::createFromFormat('m/d/Y', $request->end_aired_date)->format('Y-m-d');

        $anime = Anime::create($formFields);

        $genreIds = $request->input('genre_id'); // input means to get the value of the input field with the name genre_id

        $anime->genres()->attach($genreIds);

        return redirect('/')->with('success', 'Anime created successfully!');
    }
}
