<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function index(): View
    {

        return view('animes/index',
            [
                'animes' => Anime::latest()->filter(request(['genre', 'search']))->simplePaginate(10),
                'genres' => Genre::all()
        ]);
    }

    public function show(Anime $specificAnime): View
    {
        return view('animes/show',
            [
                'anime' => $specificAnime,
                'genres' => Genre::all()
            ]);
    }

}
