<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function hashPassword(string $password) {
        $hashedPassword = bcrypt($password);

        return $hashedPassword;
    }

    public function store(array $incomingFields) {
        $user = $this->userRepository->store($incomingFields);

        return $user;
    }

    public function show(string $name) {
        $user = $this->userRepository->getByName($name);

        return $user;
    }

    public function getAllPastesForUser(int $id) {
        $pastes = $this->userRepository->getAllPastesForUser($id);

        return $pastes;
    }

    public function getPublicPastesForGuest(string $name) {
        $pastes = $this->userRepository->getPublicPastesForGuest($name);

        return $pastes;
    }
}