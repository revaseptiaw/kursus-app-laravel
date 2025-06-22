<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Instruktur;
use App\Livewire\Forms\InstrukturForm;

class InstrukturIndex extends Component
{
    use WithPagination;

    public InstrukturForm $form;
    public bool $showModal = false;
    public ?Instruktur $editing = null;

    public function newInstruktur()
    {
        $this->editing = null;
        $this->form->reset();
        $this->showModal = true;
    }
    public function mount()
    {
        $this->form = new InstrukturForm($this, 'form');
    }
    
    public function edit(Instruktur $instruktur)
{
    \Log::info('Memulai load data instruktur ID: ' . $instruktur->id);

    $this->editing = $instruktur;
    $this->form->setInstruktur($instruktur);
    $this->showModal = true;

    \Log::info('Selesai load data instruktur ID: ' . $instruktur->id);
}

    public function save()
    {
        if ($this->editing) {
            $this->form->update();
        } else {
            $this->form->store();
        }
       // Emit ke diri sendiri agar render() jalan
        $this->dispatch('refreshInstrukturList');
        $this->showModal = false;
       
        session()->flash('message', 'Instruktur berhasil disimpan.');
    }

    public function delete(Instruktur $instruktur)
    {
        $instruktur->delete();
        session()->flash('message', 'Instruktur berhasil dihapus.');
    }

    public function render()
    {
      
    \Log::info('Render ulang komponen InstrukturIndex');
        return view('livewire.instruktur-index', [
            'instrukturs' => Instruktur::latest()->paginate(10),
        ]);
    }
}