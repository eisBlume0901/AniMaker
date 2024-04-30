<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
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

    public function showAnimeList(): View
    {
        return view('users/anime-list',
            [
                'userAnimes' => auth()->user()->reviews()->get(),
                'genres' => Genre::all()
            ]);
    }

}
