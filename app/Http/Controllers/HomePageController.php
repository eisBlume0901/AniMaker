<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User; // Have to remove and be moved to Admin Controller
use Illuminate\Http\Request;
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


    public function show(Request $request, Anime $animeToBeShown): View
    {
        $reviewStatus = $request->query('reviewStatus');

        $reviews = Review::latest('table_user_reviews.updated_at')->filterReviewStatus($animeToBeShown->id, $reviewStatus);

        return view('animes/show', [
            'anime' => $animeToBeShown,
            'genres' => Genre::all(),
            'reviewInfos' => $reviews,
        ]);
    }

    public function fallback(): View
    {
        return view('fallback');
    }

    public function showTopAnimes(): View
    {
        $animeFiltered = new Anime();
        return view('animes/top-rated',
            [
                'animes' => $animeFiltered->topRatedAnimes()->paginate(10),
                'genres' => Genre::all(),
            ]);
    }
}
