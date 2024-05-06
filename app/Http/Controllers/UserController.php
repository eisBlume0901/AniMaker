<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function create(): View
    {
        return view('users.signup',
            [
                'genres' => Genre::all()
            ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('user_images', 'public');
        }

        $user = User::create($formFields);

        auth()->login($user);

        return redirect()->route('index')->with('success', 'User created and login successfully');
    }

    public function login(): View
    {
        return view('users/login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'The provided email address is not registered.',
            ]);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ]);
        }

        auth()->login($user);

        return redirect()->route('index')->with('success', 'User login successfully');
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();
        $session = $request->session();
        $session->invalidate();
        $session->regenerateToken();

        return redirect('/')->with('success', 'User logout successfully');
    }


    public function storeReview(Anime $animeToBeReviewed): RedirectResponse
    {
        $formFields = [
            'user_id' => auth()->user()->id,
            'anime_id' => $animeToBeReviewed->id,
        ];

        if (auth()->user()->reviews()->where('anime_id', $animeToBeReviewed->id)->exists()) {
            return redirect()->route('show_anime_list')->with('error', 'Anime already added to list');
        }

        $review = Review::create($formFields);
        $review->save();

        return redirect()->route('show_anime_list')->with('success', 'Anime added to list successfully');
    }

    public function showAnimeList(Request $request): View
    {
        $watchStatus = $request->query('watchStatus');

        return view('users/anime-list',
            [
                'userAnimes' => Review::UserAnimesFilter(auth()->user()->id, $watchStatus),
                'genres' => Genre::all()
            ]);
    }

    public function editReview(Anime $animeToBeReviewed): View
    {
        return view('users/create-review',
            [
                'anime' => Review::SpecificAnimeFilter($animeToBeReviewed->id, auth()->user()->id)->first(),
                'genres' => Genre::all()
            ]);
    }

    public function updateReview(Request $request, Anime $animeToBeReviewed): RedirectResponse
    {
//        dd($animeToBeReviewed->title);

        $totalEpisodes = $animeToBeReviewed->episodes;
        $animeId = $animeToBeReviewed->id;

        $formFields = $request->validate([
            'rating' => ['nullable', 'numeric', 'between:1.00,10.00'],
            'reviewStatus' => ['nullable', 'in:Recommended,Not Recommended,Mixed Feelings'],
            'watchStatus' => ['nullable', 'in:Currently Watching,Completed,On-Hold,Dropped,Plan to Watch,Rewatched'],
            'progress' => ['nullable', 'integer', 'min:1', 'max:' . $totalEpisodes],
            'review' => ['nullable']
        ]);

        if ($formFields['progress'] == $totalEpisodes) {
            $formFields['watchStatus'] = 'Completed';
        }

        $review = Review::where('anime_id', $animeId)->where('user_id', auth()->user()->id)->first();

        if ($review) {
            $review->update($formFields);
        }

        return redirect()->route('show_anime_list')->with('success', 'Review updated successfully');
    }

    public function destroyReview($reviewedAnime): RedirectResponse
    {
        $animeToBeRemoved = Review::where('anime_id', $reviewedAnime)->where('user_id', auth()->user()->id)->first();

        if ($animeToBeRemoved) {
            $animeToBeRemoved->delete();
            return redirect()->route('show_anime_list')->with('success', 'Review deleted successfully');
        } else {
            return redirect()->route('show_anime_list')->with('error', 'Review not found');
        }
    }
}


