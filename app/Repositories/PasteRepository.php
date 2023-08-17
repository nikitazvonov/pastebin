<?php

namespace App\Repositories;

use App\Models\Paste;
use Illuminate\Database\Query\Builder;

class PasteRepository implements PasteRepositoryInterface
{
    public function isHashExists(string $hash) {
        $paste = Paste::where('hash', $hash)->first();
        if ($paste === null) {
            return false;
        }

        return true;
    }

    public function store(array $incomingFields) {
        
        $paste = Paste::create([
            'body' => $incomingFields['body'],
            'syntax_highlighting' => $incomingFields['syntax_highlighting'],
            'paste_expiration' => $incomingFields['paste_expiration'],
            'paste_exposure' => $incomingFields['paste_exposure'],
            'user_id' => $incomingFields['user_id'],
            'title' => $incomingFields['title'],
            'hash' => $incomingFields['hash']
        ]);

        return $paste;
    }

    public function getForUser(string $hash) {
        return Paste::where('hash', $hash)->firstOrFail();
    }

    public function getForGuest(string $hash) {
        return Paste::where('hash', $hash)
            ->whereIn('paste_exposure', ['public', 'unlisted'])
            ->firstOrFail();
    }

    public function getLastPublic() {
        return Paste::where('paste_exposure', 'public')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
    }

    public function getLastPrivate(int $id) {
        return Paste::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
    }

    /*

    * Изначально эти методы были написаны для того, чтобы реализовать возможности Task Scheduler,
    * но так как в базе данных могут храниться тысячи паст, получать все пасты через all нелогично,
    * поэтому истекший срок паст я решил проверять при их показе и показывать ошибку, если срок пасты истек.

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
    */
}