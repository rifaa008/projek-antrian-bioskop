<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\JadwalFilm;

class AntrianController extends Controller
{
    
    public function index()
    {
        $antrians = Antrian::with('JadwalFilm')->get();
        return view('antrians.index', compact('antrians'));
    }

    
    public function create()
    {
        return redirect()->back();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jadwal_film_id' => 'required'
        ]);

        
        $last = Antrian::where('jadwal_film_id', $request->jadwal_film_id)
                        ->orderBy('nomor_antrian', 'desc')
                        ->first();

        $nomor = $last ? $last->nomor_antrian + 1 : 1;

        Antrian::create([
            'nama' => $request->nama,
            'jadwal_film_id' => $request->jadwal_film_id,
            'nomor_antrian' => $nomor,
            'status' => 'menunggu'
        ]);

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $antrian = Antrian::findOrFail($id);
        return view('antrians.edit', compact('antrian'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $antrian = Antrian::findOrFail($id);
        $antrian->update([
            'status' => $request->status
        ]);

        return redirect()->route('antrians.index');
    }

    
    public function destroy($id)
    {
        Antrian::destroy($id);
        return redirect()->back();
    }
}