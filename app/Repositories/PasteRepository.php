<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Paste;
use Illuminate\Support\Str;

class PasteRepository
{
    private static function expirationTime($pasteExpiration) {
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

    private static function makeRandomHash() {
        return Str::random(8);
    }

    public function createPaste(Request $request) {
        $incomingFields = $request->input();
        $incomingFields['hash'] = self::makeRandomHash();
        if (!isset($incomingFields['syntax_highlighting'])) {
            $incomingFields['syntax_highlighting'] = null;
        }
        if ($incomingFields['paste_expiration'] !== 'never') {
            $incomingFields['paste_expiration'] = self::expirationTime($incomingFields['paste_expiration']);
        } else {
            $incomingFields['paste_expiration'] = null;
        }
        if (auth()->check()) {
            $incomingFields['user_id'] = auth()->id();
        } else {
            $incomingFields['user_id'] = null;
        }
        Paste::create([
            'body' => $incomingFields['body'],
            'syntax_highlighting' => $incomingFields['syntax_highlighting'],
            'paste_expiration' => $incomingFields['paste_expiration'],
            'paste_exposure' => $incomingFields['paste_exposure'],
            'user_id' => $incomingFields['user_id'],
            'title' => $incomingFields['title'],
            'hash' => $incomingFields['hash']
        ]);
    }

    public function showPaste($hash) {
        return Paste::where('hash', $hash)->firstOrFail();
    }

    public function showPasteForGuest($hash) {
        return Paste::where('hash', $hash)
            ->where('paste_exposure', 'public')
            ->orWhere('paste_exposure', 'unlisted')
            ->firstOrFail();
    }

    public function lastPublicPastes() {
        return Paste::where('paste_exposure', 'public')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
    }

    public function lastPrivatePastes() {
        if (auth()->check()) {
            return Paste::where('user_id', auth()->id())
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();
        }
    }

    public static function deletePasteTask() {
        $allPastes = Paste::all();
        foreach ($allPastes as $paste) {
            if (now() > $paste->paste_expiration && $paste->paste_expiration !== null) {
                PasteRepository::deletePaste($paste->id);
            }
        }
    }

    public static function deletePaste($id) {
        Paste::find($id)->delete();
    }
}