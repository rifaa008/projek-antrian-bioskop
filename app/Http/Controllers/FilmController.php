<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        return response()->json(Film::all());
    }

    public function store(Request $request)
    {
        $film = Film::create($request->all());
        return response()->json($film);
    }

    public function show($id)
    {
        return response()->json(Film::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);
        $film->update($request->all());

        return response()->json($film);
    }

    public function destroy($id)
    {
        Film::destroy($id);
        return response()->json(['message' => 'Film dihapus']);
    }
}