<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // Hanya ambil notes milik user yang login
    $latestNotes = Note::where('user_id', auth()->id())
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();

    $allNotes = Note::where('user_id', auth()->id())
                     ->orderBy('created_at', 'desc')
                     ->get();

    return view('notes.index', compact('latestNotes', 'allNotes'));
    }

}
