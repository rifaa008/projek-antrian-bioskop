<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\JadwalFilm;
use App\Models\Antrian;

class AdminController extends Controller
{
    public function dashboard()
    {
        
        $totalFilms = Film::count();
        $totalJadwal = JadwalFilm::count();
        $totalAntrian = Antrian::count();

        
        $menunggu = Antrian::where('status', 'menunggu')->count();
        $dipanggil = Antrian::where('status', 'dipanggil')->count();
        $selesai = Antrian::where('status', 'selesai')->count();

        
        $latestAntrians = Antrian::with('jadwalFilm.film')
            ->latest() 
            ->take(5)  
            ->get();

        return view('admin.dashboard', compact(
            'totalFilms',
            'totalJadwal',
            'totalAntrian',
            'menunggu',
            'dipanggil',
            'selesai',
            'latestAntrians' 
        ));
    }
}