<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function loginUser(Request $request);

    public function createUser(Request $request);

    public function logoutUser(Request $request);

    public function showUserByName($name);

    public function showAllPastesForUser();

    public function showPublicPastesForGuest($name);
}