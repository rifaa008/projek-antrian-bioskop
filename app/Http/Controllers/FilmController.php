<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'durasi' => 'required',
            'deskripsi' => 'required',
            'poster' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Film::create($data);

        return redirect()->route('films.index');
    }

    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'durasi' => 'required',
            'deskripsi' => 'required',
            'poster' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('poster')) {
            if ($film->poster) {
                Storage::delete('public/' . $film->poster);
            }
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $film->update($data);

        return redirect()->route('films.index');
    }

    public function destroy($id)
{
    $film = Film::findOrFail($id);

    if ($film->poster && file_exists(public_path('storage/' . $film->poster))) {
        unlink(public_path('storage/' . $film->poster));
    }

    $film->delete();

    return redirect('/films');
}
}