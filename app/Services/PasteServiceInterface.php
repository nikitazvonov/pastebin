<?php

namespace App\Services;

interface PasteServiceInterface
{
    public function expirationTime(string $pasteExpiration);
    
    public function makeRandomHash();

    public function checkAndGetExpiration(string $expiration);

    public function store(array $incomingFields);

    public function getForUser(string $hash);

    public function getForGuest(string $hash);

    public function isExpired($paste);

    public function getLastPublic();

    public function getLastPrivate();
}