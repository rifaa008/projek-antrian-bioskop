<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = Antrian::with('jadwalFilm.film')
            ->get()
            ->sortBy(function ($a) {
                return $a->jadwalFilm->studio ?? 0;
            })
            ->groupBy(function ($a) {
                return $a->jadwalFilm->studio ?? 'Unknown';
            });

        return view('antrians.index', compact('antrians'));
    }

    public function edit($id)
    {
        $antrian = Antrian::with('jadwalFilm.film')
            ->findOrFail($id);

        return view('antrians.edit', compact('antrian'));
    }

    public function update(Request $request, $id)
    {
        $antrian = Antrian::findOrFail($id);

        $antrian->update([
            'status' => $request->status
        ]);

        return redirect()->route('antrians.index');
    }

    public function destroy($id)
    {
        Antrian::destroy($id);

        return redirect()->route('antrians.index');
    }
}