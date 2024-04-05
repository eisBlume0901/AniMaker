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

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'episodes' => ['required', 'integer', 'min:1'],
            'studio' => 'required',
            'description' => ['required', Rule::unique('table_animes', 'description')],
            'start_aired_date' => 'required|date_format:m/d/Y',
            'end_aired_date' => 'required|date_format:m/d/Y',
            'genre_id' => 'required|array',
        ]);


        $formFields['start_aired_date'] = Carbon::createFromFormat('m/d/Y', $request->start_aired_date)->format('Y-m-d');
        $formFields['end_aired_date'] = Carbon::createFromFormat('m/d/Y', $request->end_aired_date)->format('Y-m-d');

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $anime = Anime::create($formFields);

        $genreIds = $request->input('genre_id'); // input means to get the value of the input field with the name genre_id

        $anime->genres()->attach($genreIds);

        return redirect('/')->with('success', 'Anime created successfully!');
    }

    public function edit(Anime $specificAnime): View
    {
        return view('animes.edit',
            [
                'anime' => $specificAnime,
                'genres' => Genre::all()
            ]);
    }

    public function update(Request $request, Anime $specificAnime)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'episodes' => ['required', 'integer', 'min:1'],
            'studio' => 'required',
            'description' => ['required', Rule::unique('table_animes', 'description')->ignore($specificAnime->id)],
            'start_aired_date' => 'required|date_format:m/d/Y',
            'end_aired_date' => 'required|date_format:m/d/Y',
            'genre_id' => 'required|array',
        ]);

        $formFields['start_aired_date'] = Carbon::createFromFormat('m/d/Y', $request->start_aired_date)->format('Y-m-d');
        $formFields['end_aired_date'] = Carbon::createFromFormat('m/d/Y', $request->end_aired_date)->format('Y-m-d');

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $specificAnime->update($formFields);

        $genreIds = $request->input('genre_id');

        $specificAnime->genres()->sync($genreIds);

        return redirect('/anime/' . $specificAnime->id)->with('success', 'Anime updated successfully!');
    }
}
