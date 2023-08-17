<?php

namespace App\Services;

use App\Repositories\PasteRepositoryInterface;
use Illuminate\Support\Str;

class PasteService implements PasteServiceInterface
{
    private PasteRepositoryInterface $pasteRepository;

    public function __construct(PasteRepositoryInterface $pasteRepository) {
        $this->pasteRepository = $pasteRepository;
    }

    public function expirationTime(string $pasteExpiration) {
        switch ($pasteExpiration) {
            case '10 minutes':
                return now()->addMinutes(10);
            case '1 hour':
                return now()->addHour();
            case '3 hours':
                return now()->addHours(3);
            case '1 day':
                return now()->addDay();
            case '1 week':
                return now()->addWeek();
            case '1 month':
                return now()->addMonth();
        }
    }

    public function makeRandomHash() {
        $hash = Str::random(8);
        if ($this->pasteRepository->isHashExists($hash)) {
            $this->makeRandomHash();
        }

        return $hash;
    }

    public function checkAndGetExpiration(string $expiration) {
        if ($expiration !== 'never') {
            $pasteExpiration = $this->expirationTime($expiration);
            return $pasteExpiration;
        } else {
            return $expiration = null;
        }
    }

    public function store(array $incomingFields) {
        $incomingFields['hash'] = $this->makeRandomHash();
        if (!isset($incomingFields['syntax_highlighting'])) {
            $incomingFields['syntax_highlighting'] = null;
        }
        $incomingFields['paste_expiration'] = $this->checkAndGetExpiration($incomingFields['paste_expiration']);

        $paste = $this->pasteRepository->store($incomingFields);

        return $paste;
    }

    public function getForUser(string $hash) {
        $paste = $this->pasteRepository->getForUser($hash);

        return $paste;
    }

    public function getForGuest(string $hash) {
        $paste = $this->pasteRepository->getForGuest($hash);

        return $paste;
    }

    public function isExpired($paste) {
        if (now() > $paste->paste_expiration && $paste->paste_expiration !== null) {
            return true;
        }

        return false;
    }

    public function getLastPublic() {
        $pastes = $this->pasteRepository->getLastPublic();

        return $pastes;
    }

    public function getLastPrivate() {
        if (auth()->check()) {
            $id = auth()->id();
            $pastes = $this->pasteRepository->getLastPrivate($id);

            return $pastes;
        }  
    }
}