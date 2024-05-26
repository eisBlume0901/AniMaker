<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function create(): View
    {
        return view('admin/create-user');
    }
    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $formFields['password'] = bcrypt($request->password);

        $newUser = User::create($formFields);
        $newUser->assignRole('user');
        $newUser->save();

        return redirect()->route('manage_users')->with('success', 'User created successfully!');

    }
    public function edit(User $userToBeEdited): View
    {
        $user = new User();
        $counts = $user->getUserCounts($userToBeEdited->id);
        return view('admin/edit-user', ['user' => $userToBeEdited, 'counts' => $counts]);
    }
    public function update(Request $request, User $userToBeUpdated): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('user_images', 'public');
        }
        $userToBeUpdated->update($formFields);

        return redirect()->route('manage_users')->with('success', 'User updated successfully!');
    }

    public function destroy(User $userToBeDestroyed): RedirectResponse
    {
        $userToBeDestroyed->delete();

        return redirect()->route('manage_users')->with('success', 'User deleted successfully!');
    }
}
