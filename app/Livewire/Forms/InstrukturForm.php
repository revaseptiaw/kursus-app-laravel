<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Instruktur;

class InstrukturForm extends Form
{
    public ?Instruktur $instruktur = null;

    public $nama = '';
    public $email = '';

    public function rules()
    {
        return [
            'nama' => 'required|string|min:3',
            'email' => 'required|email|unique:instrukturs,email,' . ($this->instruktur?->id ?? 'NULL'),
        ];
    }

    public function setInstruktur(Instruktur $instruktur)
    {
        $this->instruktur = $instruktur;
        $this->nama = $instruktur->nama;
        $this->email = $instruktur->email;
    }

    public function store()
    {
        $this->validate();
        Instruktur::create([
            'nama' => $this->nama,
            'email' => $this->email,
        ]);
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->instruktur->update([
            'nama' => $this->nama,
            'email' => $this->email,
        ]);
        $this->reset();
    }
}
