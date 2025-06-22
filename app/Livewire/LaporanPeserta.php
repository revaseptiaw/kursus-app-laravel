<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kursus;

class LaporanPeserta extends Component
{
    public function render()
    {
        // Mengambil kursus beserta jumlah pendaftarannya
        $laporanKursus = Kursus::withCount('pendaftaran')->orderBy('pendaftaran_count', 'desc')->get();

        return view('livewire.laporan-peserta', compact('laporanKursus'));
    }
}
