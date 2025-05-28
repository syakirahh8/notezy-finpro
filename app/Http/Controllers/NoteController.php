<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index() {
    $notes = Note::where('user_id', auth()->id())
                  ->orderBy('created_at', 'desc')
                  ->get();

    return view('notes.index', compact('notes'));
}


    // create
        public function create() {
        $recentNotes = Note::latest()->take(5)->get(); // ambil 5 note terbaru juga untuk ditampilkan di halaman create
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

    return redirect()->route('dashboard')->with('success', 'Note berhasil disimpan!');
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


}
