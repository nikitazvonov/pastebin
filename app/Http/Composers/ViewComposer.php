<?php

namespace App\Http\Composers;

use App\Services\PasteServiceInterface;
use Illuminate\View\View;

class ViewComposer
{
    private PasteServiceInterface $pasteService;

    public function __construct(PasteServiceInterface $pasteService) {
        $this->pasteService = $pasteService;
    }

    public function compose(View $view) {
        $publicPastes = $this->pasteService->getLastPublic();
        $myPastes = $this->pasteService->getLastPrivate();

        $view->with('publicPastes', $publicPastes)->with('myPastes', $myPastes);
    }
}