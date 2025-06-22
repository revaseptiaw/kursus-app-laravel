<?php

namespace App\Livewire\Materi;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Kursus;
use App\Models\Materi;

class PerKursus extends Component
{
    use WithFileUploads;

    public $kursus;
    public $judul, $deskripsi, $file;

    protected $rules = [
        'judul' => 'required|min:5',
        'deskripsi' => 'nullable',
        'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,zip|max:10240',
    ];

    public function mount(Kursus $kursus)
    {
        $this->kursus = $kursus;
    }

    public function upload()
    {
        $this->validate();
        $path = $this->file->store('materi', 'public');

        $this->kursus->materi()->create([
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'file_path' => $path,
        ]);

        $this->reset('judul', 'deskripsi', 'file');
        session()->flash('message', 'Materi berhasil diunggah.');
    }

    public function render()
    {
        return view('livewire.materi.per-kursus', [
            'materis' => $this->kursus->materi()->latest()->get()
        ]);
    }
}
