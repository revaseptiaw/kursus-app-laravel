<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pendaftaran;
use App\Models\Kursus;
use App\Livewire\Forms\PendaftaranForm;

class PendaftaranIndex extends Component
{
    use WithPagination;

    public PendaftaranForm $form;
    public bool $showModal = false;

    public function newPendaftaran()
    {
        $this->form->reset();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::with('peserta')->findOrFail($id);

        $this->form->pendaftaran = $pendaftaran;
        $this->form->kursus_id = $pendaftaran->kursus_id;
        $this->form->status = $pendaftaran->status;
        $this->form->peserta_id = $pendaftaran->peserta_id;
        $this->form->peserta_nama = $pendaftaran->peserta->nama;
        $this->form->peserta_email = $pendaftaran->peserta->email;

        $this->showModal = true;
    }

    public function save()
    {
        if ($this->form->pendaftaran) {
            $this->form->update();
            session()->flash('message', 'Pendaftaran berhasil diperbarui.');
        } else {
            $this->form->store();
            session()->flash('message', 'Pendaftaran berhasil ditambahkan.');
        }

        $this->showModal = false;
    }

    public function delete(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        session()->flash('message', 'Pendaftaran berhasil dihapus.');
    }

    public function render()
    {
        $pendaftarans = Pendaftaran::with(['kursus', 'peserta'])->latest()->paginate(10);
        $kursusList = Kursus::all();

        return view('livewire.pendaftaran-index', [
            'pendaftarans' => $pendaftarans,
            'kursusList' => $kursusList,
        ]);
    }
}
