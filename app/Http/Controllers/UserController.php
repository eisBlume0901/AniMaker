<?php

namespace App\Http\Controllers;

use App\Models\Genre;
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


        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('success', 'User created and login successfully');
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

        return redirect('/')->with('success', 'User login successfully');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect('/')->with('success', 'User logout successfully');
    }
}
