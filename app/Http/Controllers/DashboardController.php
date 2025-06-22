<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use App\Models\Instruktur;
use App\Models\Pendaftaran;
use App\Models\Materi;

class DashboardController extends Controller
{
    public function index()
    {
         return view('dashboard', [
        'jumlahKursus' => Kursus::count(),
        'jumlahInstruktur' => Instruktur::count(),
        'jumlahPeserta' => Pendaftaran::distinct('peserta_id')->count(),
        'jumlahMateri' => Materi::count(),
        'kursusTerbaru' => Kursus::latest()->take(5)->get(),
        'chartLabels' => ['Jan', 'Feb', 'Mar', 'Apr'], // Dummy chart
        'chartData' => [5, 12, 8, 20],
        ]);
    }
}
