<?php

namespace App\Http\Controllers;

use App\Repositories\PasteRepositoryInterface;
use Illuminate\Http\Request;

class PasteController extends Controller
{
    private $pasteRepository;

    public function __construct(PasteRepositoryInterface $pasteRepository) {
        $this->pasteRepository = $pasteRepository;
    }

    public function index() {
        return view('pastes.index');
    }

    public function store(Request $request) {
        $this->pasteRepository->createPaste($request);

        return redirect('/');
    }

    public function show($hash) {
        if (auth()->check()) {
            $paste = $this->pasteRepository->showPaste($hash);
        } else {
            $paste = $this->pasteRepository->showPasteForGuest($hash);
        }
        
        return view('pastes.show', with(['paste' => $paste]));
    }
}
