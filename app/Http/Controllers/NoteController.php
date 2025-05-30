<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    //middleware
    public function __construct() {
    $this->middleware('auth');
}

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


    // create
        public function create() {
        $recentNotes = Note::latest()->take(5)->get(); 
        return view('notes.create', compact('recentNotes'));
    }

    // store
    public function store(Request $request) {
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    Note::create([
        'title' => $request->title,
        'content' => $request->content,
         'user_id' => auth()->id(),
    ]);

    return redirect()->route('dashboard')->with('success', 'Note successfully saved!');
}


    // Tampilkan form edit catatan
        public function edit(Note $note) {
        return view('notes.edit', compact('note'));
    }

    // Tampilkan detail catatan (preview)
        public function show(Note $note) {
        return view('notes.show', compact('note'));
    }

    public function update(Request $request, Note $note) {
    // Validasi data
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
    ]);

    // Update data note
    $note->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    // Redirect ke dashboard atau halaman lain dengan pesan sukses
    return redirect()->route('dashboard')->with('success', 'Note updated successfully!');
    }

    // delete data
    public function destroy($id) {
    $note = Note::findOrFail($id);
    $note->delete();

    return redirect()->route('dashboard')->with('success', 'Note deleted successfully!');
    }

    // Tampilkan catatan yang dihapus (Trash)
    public function trash() {
    $trashedNotes = Note::onlyTrashed()->where('user_id', auth()->id())->get();
    return view('notes.trash', compact('trashedNotes'));
    }

    // Restore catatan dari Trash
    public function restore($id) {
    $note = Note::onlyTrashed()->where('user_id', auth()->id())->findOrFail($id);
    $note->restore();
    return redirect()->route('notes.trash')->with('success', 'Note restored successfully!');
    }

    // Hapus permanen catatan dari Trash
    public function forceDelete($id) {
    $note = Note::onlyTrashed()->where('user_id', auth()->id())->findOrFail($id);
    $note->forceDelete();
    return redirect()->route('notes.trash')->with('success', 'Note permanently deleted!');
    }

    // Buat Favorite Notes untuk halaman
    public function toggleFavorite(Note $note) {
    $note->favorite = !$note->favorite;
    $note->save();

    $message = $note->favorite ? 'Note marked as favorite!' : 'Note removed from favorites.';

    return redirect()->back()->with('success', $message);
    }

    public function favorites() {
    $favorites = Note::where('user_id', auth()->id())
                      ->where('favorite', true)
                      ->orderBy('created_at', 'desc')
                      ->get();

    return view('notes.favorites', compact('favorites'));
    }

}
