<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paste;

class UserRepository implements UserRepositoryInterface
{
    public function loginUser(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required|min:8|max:20',
            'password' => 'required|min:8|max:20'
        ]);

        if (auth()->attempt($incomingFields)) {
            $request->session()->regenerate();
        }
    }

    public function createUser(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required|min:8|unique:users|max:20',
            'password' => 'required|min:8|max:20'
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);

        auth()->login($user);
    }

    public function logoutUser(Request $request) {
        auth()->logout();
    }

    public function showUserByName($name) {
        return User::where('name', $name)->firstOrFail();
    }

    public function showAllPastesForUser() {
        return $pastes = User::find(auth()->id())
            ->pastes()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function showPublicPastesForGuest($name) {
        $user = User::where('name', $name)->firstOrFail();
        return User::find($user->id)
            ->pastes()
            ->where('paste_exposure', 'public')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
}