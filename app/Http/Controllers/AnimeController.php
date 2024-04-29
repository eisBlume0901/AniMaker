<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
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

    public function edit(Anime $animeToBeEdited): View
    {
        return view('animes.edit',
            [
                'anime' => $animeToBeEdited,
                'genres' => Genre::all()
            ]);
    }

    public function update(Request $request, Anime $animeToBeUpdated): RedirectResponse
    {
        $formFields = $request->validate([
            'title' => 'required',
            'episodes' => ['required', 'integer', 'min:1'],
            'studio' => 'required',
            'description' => ['required', Rule::unique('table_animes', 'description')->ignore($animeToBeUpdated ->id)],
            'start_aired_date' => 'required|date_format:m/d/Y',
            'end_aired_date' => 'required|date_format:m/d/Y',
            'genre_id' => 'required|array',
        ]);

        $formFields['start_aired_date'] = Carbon::createFromFormat('m/d/Y', $request->start_aired_date)->format('Y-m-d');
        $formFields['end_aired_date'] = Carbon::createFromFormat('m/d/Y', $request->end_aired_date)->format('Y-m-d');

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $animeToBeUpdated->update($formFields);

        $genreIds = $request->input('genre_id');

        $animeToBeUpdated->genres()->sync($genreIds);

        return redirect('/anime/' . $animeToBeUpdated->id)->with('success', 'Anime updated successfully!');
    }

    public function destroy(Anime $animeToBeDestroyed): RedirectResponse
    {
        $animeToBeDestroyed->genres()->detach();
        $animeToBeDestroyed->delete();
        return redirect('/')->with('success', 'Anime deleted successfully!');
    }
}
