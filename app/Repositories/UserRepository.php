<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function store(array $incomingFields) {

        $user = User::create($incomingFields);

        return $user;
    }

    public function getByName(string $name) {
        return User::where('name', $name)->firstOrFail();
    }

    public function getAllPastesForUser(int $id) {
        return $pastes = User::find($id)
            ->pastes()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getPublicPastesForGuest(string $name) {
        $user = User::where('name', $name)->firstOrFail();
        return User::find($user->id)
            ->pastes()
            ->where('paste_exposure', 'public')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
}