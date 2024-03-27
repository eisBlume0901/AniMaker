<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    //
    public function create() {
        return view('animes/create', [
            'genres' => Genre::all()
            ]);
    }


}
