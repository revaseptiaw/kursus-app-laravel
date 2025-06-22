<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Kursus;
use App\Models\Instruktur; // ⬅ Tambahkan ini
use Livewire\WithPagination;
use App\Livewire\Forms\KursusForm;

class KursusIndex extends Component
{
    use WithPagination;

    public KursusForm $form;
    public bool $showModal = false;
    public ?Kursus $editing = null;

    public function newKursus()
    {
        $this->editing = null;
        $this->form->reset();
        $this->showModal = true;
    }

    public function edit(Kursus $kursus)
    {
        $this->editing = $kursus;
        $this->form->setKursus($kursus);
        $this->showModal = true;
    }

    public function save()
    {
        if ($this->editing) {
            $this->form->update();
        } else {
            $this->form->store();
        }
        
        $this->showModal = false;
        session()->flash('message', 'Kursus berhasil disimpan.');
    }

    public function delete(Kursus $kursus)
    {
        $kursus->delete();
        session()->flash('message', 'Kursus berhasil dihapus.');
    }

    public function render()
    {
       $kursusList = Kursus::with('instruktur')->latest()->paginate(10);
    $instrukturs = Instruktur::all();

    return view('livewire.kursus-index', compact('kursusList', 'instrukturs'))
        ->layout('layouts.app'); // ← ini bagian yang disisipkan
    }
}

