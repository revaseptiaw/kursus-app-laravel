<?php

namespace App\Livewire\Materi;

use Livewire\Component;
use App\Models\Materi;

class Index extends Component
{
    public function delete($id)
    {
        $materi = Materi::find($id);
        if ($materi) {
            $materi->delete();
            session()->flash('message', 'Materi berhasil dihapus.');
        }
    }

    public function render()
    {
        $materis = Materi::with('kursus')->latest()->get();
        return view('livewire.materi.index', compact('materis'));
    }
}

