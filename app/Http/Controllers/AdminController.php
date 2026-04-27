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
        // Total data
        $totalFilms = Film::count();
        $totalJadwal = JadwalFilm::count();
        $totalAntrian = Antrian::count();

        // Status antrian
        $menunggu = Antrian::where('status', 'menunggu')->count();
        $dipanggil = Antrian::where('status', 'dipanggil')->count();
        $selesai = Antrian::where('status', 'selesai')->count();

        return view('admin.dashboard', compact(
            'totalFilms',
            'totalJadwal',
            'totalAntrian',
            'menunggu',
            'dipanggil',
            'selesai'
        ));
    }
}