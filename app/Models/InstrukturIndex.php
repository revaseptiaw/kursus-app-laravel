<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Instruktur;
use App\Livewire\Forms\InstrukturForm;

class Index extends Component
{
    public function render()
    {
        return view('livewire.instruktur.index', [
            'instrukturs' => Instruktur::all()
        ]);
    }
}