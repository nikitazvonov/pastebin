<?php

namespace App\Repositories;

interface PasteRepositoryInterface
{
    public function isHashExists(string $hash);

    public function store(array $incomingFields);

    public function getForUser(string $hash);

    public function getForGuest(string $hash);

    public function getLastPublic();

    public function getLastPrivate(int $id);

    // public static function deletePasteTask();

    // public static function deletePaste($id);
}