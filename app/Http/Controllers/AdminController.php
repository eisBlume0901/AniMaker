<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{

    public function manageAnimes(): View
    {
        return view('admin/manage-animes',
            [
                'animes' => Anime::latest()->simplePaginate(10),
                'genres' => Genre::all()
            ]
        );
    }

    public function manageUsers(): View {
        return view('admin/manage-users',
            [
                'users' => User::latest()->simplePaginate(10)
            ]);

    }

    public function edit(User $specificUser): View
    {
        return view('admin/edit-user',
            [
                'user' => $specificUser
            ]);
    }

    public function create(): View
    {
        return view('animes/create',
            [
                'genres' => Genre::all()
            ]);
    }
}
