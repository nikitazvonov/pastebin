<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function store(array $incomingFields);

    public function getByName(string $name);

    public function getAllPastesForUser(int $id);

    public function getPublicPastesForGuest(string $name);
}