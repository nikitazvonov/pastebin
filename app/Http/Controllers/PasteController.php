<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paste;
use App\Repositories\PasteRepository;
use Illuminate\Support\Facades\View;

class PasteController extends Controller
{
    private $pasteRepository;

    public function __construct(PasteRepository $pasteRepository) {
        $this->pasteRepository = $pasteRepository;
    }

    public function index() {
        return view('pastes.index');
    }

    public function store(Request $request) {
        $this->pasteRepository->createPaste($request);

        return redirect('/');
    }

    public function show(Request $request, $hash) {
        if (auth()->check()) {
            $paste = $this->pasteRepository->showPaste($hash);
        } else {
            $paste = $this->pasteRepository->showPasteForGuest($hash);
        }
        
        return view('pastes.show', with(['paste' => $paste]));
    }
}
