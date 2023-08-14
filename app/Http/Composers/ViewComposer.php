<?php

namespace App\Http\Composers;

use App\Http\Controllers\PasteController;
use App\Repositories\PasteRepository;
use Illuminate\View\View;

class ViewComposer
{
    public function compose(View $view) {
        $pasteRepository = new PasteRepository();

        $publicPastes = $pasteRepository->lastPublicPastes();
        $myPastes = $pasteRepository->lastPrivatePastes();

        $view->with('publicPastes', $publicPastes)->with('myPastes', $myPastes);
    }
}