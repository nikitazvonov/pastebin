<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function login() {
        return view('users.login');
    }

    public function create() {
        return view('users.signup');
    }

    public function authenticate(Request $request) {
        $this->userRepository->loginUser($request);

        return redirect('/');
    }

    public function logout(Request $request) {
        $this->userRepository->logoutUser($request);

        return redirect('/');
    }

    public function store(Request $request) {
        $this->userRepository->createUser($request);

        return redirect('/');
    }

    public function show($name) {
        $user = $this->userRepository->showUserByName($name);
        if (auth()->check()) {
            $pastes = $this->userRepository->showAllPastesForUser();
        } else {
            $pastes = $this->userRepository->showPublicPastesForGuest($name);
        }

        return view('users.show', with([
            'user' => $user,
            'pastes' => $pastes
        ]));
    }
}
