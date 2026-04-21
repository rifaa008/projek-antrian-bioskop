<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\JadwalFilm;
use App\Models\User;

class AntrianController extends Controller
{
    

    public function index()
    {   
    $antrians = Antrian::with(['user','jadwalFilm.film'])->get();
    return view('antrians.index', compact('antrians'));
    }

    
    public function show($id)
    {
        $data = Antrian::with(['user', 'jadwalFilm'])->findOrFail($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        Antrian::destroy($id);
        return response()->json(['message' => 'Antrian dihapus']);
    }
}