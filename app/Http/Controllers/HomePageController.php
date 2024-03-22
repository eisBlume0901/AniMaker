<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() {

        return view('animes/index',
            [
                'animes' => Anime::latest()->ofGenre(request('genre', 'search'))->get(),
                'genres' => Genre::all()
        ]);
    }

    public function show(Anime $specificAnime)
    {
        return view('animes/show',
            [
                'anime' => $specificAnime,
                'genres' => Genre::all()
            ]);
    }
}
