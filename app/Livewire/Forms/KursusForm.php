<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Form;
use App\Models\Kursus;

class KursusForm extends Form
{
    public ?Kursus $kursus;

    public $nama_kursus = '';
    public $durasi = '';
    public $biaya = '';
    public $instruktur_id = '';

    public function rules()
    {
        return [
            'nama_kursus' => 'required|string|min:5',
            'durasi' => 'required|string',
            'biaya' => 'required|numeric|min:0',
            'instruktur_id' => 'required|exists:instrukturs,id',
        ];
    }

    public function setKursus(Kursus $kursus)
    {
        $this->kursus = $kursus;
        $this->nama_kursus = $kursus->nama_kursus;
        $this->durasi = $kursus->durasi;
        $this->biaya = $kursus->biaya;
        $this->instruktur_id = $kursus->instruktur_id;
    }

    public function store()
    {
        $this->validate();
        Kursus::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->kursus->update($this->all());
        $this->reset();
    }
}
