<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = Antrian::with('jadwalFilm.film')->get();
        return view('antrians.index', compact('antrians'));
    }

    public function edit($id)
    {
        $antrian = Antrian::with('jadwalFilm.film')->findOrFail($id);
        return view('antrians.edit', compact('antrian'));
    }

    public function update(Request $request, $id)
    {
        $antrian = Antrian::findOrFail($id);

        $antrian->update([
            'status' => $request->status
        ]);

        return redirect('/antrians');
    }

    public function destroy($id)
    {
        Antrian::destroy($id);
        return back();
    }
}