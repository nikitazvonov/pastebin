<?php

namespace App\Http\Controllers;

use App\Services\PasteServiceInterface;
use Illuminate\Http\Request;

class PasteController extends Controller
{
    private $pasteService;

    public function __construct(PasteServiceInterface $pasteService) {
        $this->pasteService = $pasteService;
    }

    public function index() {
        return view('pastes.index');
    }

    public function store(Request $request) {
        $incomingFields = $request->input();

        if (auth()->check()) {
            $incomingFields['user_id'] = auth()->id();
        } else {
            $incomingFields['user_id'] = null;
        }

        $paste = $this->pasteService->store($incomingFields);

        return redirect()->route('pastes.show', $paste->hash)->with('paste', $paste);
    }

    public function show(string $hash) {
        if (auth()->check()) {
            $paste = $this->pasteService->getForUser($hash);
        } else {
            $paste = $this->pasteService->getForGuest($hash);
        }
        if ($this->pasteService->isExpired($paste)) {
            abort(404);
        }
        
        return view('pastes.show', with(['paste' => $paste]));
    }
}
