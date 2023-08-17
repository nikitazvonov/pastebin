<?php

namespace App\Services;

interface UserServiceInterface
{
    public function hashPassword(string $password);

    public function store(array $incomingFields);

    public function show(string $name);

    public function getAllPastesForUser(int $id);

    public function getPublicPastesForGuest(string $name);
}