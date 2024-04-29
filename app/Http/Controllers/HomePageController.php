<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\User; // Have to remove and be moved to Admin Controller
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function index(): View
    {
        return view('animes/index',
            [
                'animes' => Anime::latest()->filter(request(['genre']))->paginate(10),
                'genres' => Genre::all()
        ]);
    }

    // Route Model Binding vs findOrFail() sql query 0
    public function show(Anime $animeToBeShown): View
    {
        return view('animes/show',
            [
                'anime' => $animeToBeShown,
                'genres' => Genre::all()
            ]);

    }

    public function fallback(): View
    {
        return view('fallback');
    }

    public function showTopAnimes(): View
    {
        return view('animes/top-rated',
            [
                'animes' => Anime::latest()->paginate(10),
                'genres' => Genre::all(),
            ]);
    }
}
