<?php

namespace App\Http\Controllers;

use App\Services\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService) {
        $this->userService = $userService;
    }

    public function login() {
        return view('users.login');
    }

    public function create() {
        return view('users.signup');
    }

    public function authenticate(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required|min:8|max:20',
            'password' => 'required|min:8|max:20'
        ]);

        if (auth()->attempt($incomingFields)) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(Request $request) {
        auth()->logout();

        return redirect('/');
    }

    public function store(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required|min:8|unique:users|max:20',
            'password' => 'required|min:8|max:20'
        ]);

        $incomingFields['password'] = $this->userService->hashPassword($incomingFields['password']);

        $user = $this->userService->store($incomingFields);

        auth()->login($user);

        return redirect('/');
    }

    public function show(string $name) {
        $user = $this->userService->show($name);
        if (auth()->check()) {
            $id = auth()->id();
            $pastes = $this->userService->getAllPastesForUser($id);
        } else {
            $pastes = $this->userService->getPublicPastesForGuest($name);
        }

        return view('users.show', with([
            'user' => $user,
            'pastes' => $pastes
        ]));
    }
}
