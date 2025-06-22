<?php

namespace App\Livewire\Materi;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Materi;
use App\Models\Kursus;

class Form extends Component
{
    use WithFileUploads;

    public $materi;
    public $judul;
    public $deskripsi;
    public $file;
    public $kursus_id;

    protected $rules = [
        'judul' => 'required|string|min:5',
        'deskripsi' => 'nullable|string',
        'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip|max:10240',
        'kursus_id' => 'required|exists:kursus,id',
    ];

    public function mount($materi = null)
    {
        $this->materi = $materi ? Materi::findOrFail($materi) : new Materi();

        $this->judul = $this->materi->judul;
        $this->deskripsi = $this->materi->deskripsi;
        $this->kursus_id = $this->materi->kursus_id;
    }

    public function save()
    {
        $this->validate();

        if ($this->file) {
            $path = $this->file->store('materi', 'public');
            $this->materi->file_path = $path;
        }

        $this->materi->judul = $this->judul;
        $this->materi->deskripsi = $this->deskripsi;
        $this->materi->kursus_id = $this->kursus_id;

        $this->materi->save();

        session()->flash('message', 'Materi berhasil disimpan.');
        return redirect()->route('materi.index');
    }

        public function render()
    {
        return view('livewire.materi.form', [
            'kursusList' => \App\Models\Kursus::all()
        ]);
    }

}
