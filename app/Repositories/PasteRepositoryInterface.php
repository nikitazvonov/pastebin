<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface PasteRepositoryInterface
{
    public static function expirationTime($pasteExpiration);

    public static function makeRandomHash();

    public function createPaste(Request $request);

    public function showPaste($hash);

    public function showPasteForGuest($hash);

    public function lastPublicPastes();

    public function lastPrivatePastes();

    public static function deletePasteTask();

    public static function deletePaste($id);
}