<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Pendaftaran;
use App\Models\Peserta;
use Illuminate\Validation\ValidationException;

class PendaftaranForm extends Form
{
public ?Pendaftaran $pendaftaran = null;


    public $kursus_id = '';
    public $peserta_id = '';
    public $status = 'terdaftar';

    // Untuk input peserta baru
    public $peserta_nama = '';
    public $peserta_email = '';

    public function setPendaftaran(Pendaftaran $pendaftaran): void
    {
        $this->pendaftaran = $pendaftaran;
        $this->kursus_id = $pendaftaran->kursus_id;
        $this->status = $pendaftaran->status;
        $this->peserta_id = $pendaftaran->peserta_id;
        $this->peserta_nama = $pendaftaran->peserta->nama;
        $this->peserta_email = $pendaftaran->peserta->email;
    }

    public function rules(): array
    {
        return [
            'kursus_id' => 'required|exists:kursus,id',
            'peserta_nama' => 'required|string|min:3',
            'peserta_email' => 'required|email',
            'status' => 'required|string',
        ];
    }

    public function store(): void
    {
        $this->validate();

        $peserta = Peserta::firstOrCreate(
            ['email' => $this->peserta_email],
            ['nama' => $this->peserta_nama]
        );

        $sudahTerdaftar = Pendaftaran::where('kursus_id', $this->kursus_id)
                            ->where('peserta_id', $peserta->id)
                            ->exists();

        if ($sudahTerdaftar) {
            throw ValidationException::withMessages([
                'peserta_email' => 'Peserta ini sudah terdaftar di kursus ini.',
            ]);
        }

        Pendaftaran::create([
            'kursus_id' => $this->kursus_id,
            'peserta_id' => $peserta->id,
            'status' => $this->status,
        ]);

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $peserta = $this->pendaftaran->peserta;
        $peserta->update([
            'nama' => $this->peserta_nama,
            'email' => $this->peserta_email,
        ]);

        $sudahTerdaftar = Pendaftaran::where('kursus_id', $this->kursus_id)
                            ->where('peserta_id', $peserta->id)
                            ->where('id', '!=', $this->pendaftaran->id)
                            ->exists();

        if ($sudahTerdaftar) {
            throw ValidationException::withMessages([
                'peserta_email' => 'Peserta ini sudah terdaftar di kursus ini.',
            ]);
        }

        $this->pendaftaran->update([
            'kursus_id' => $this->kursus_id,
            'peserta_id' => $peserta->id,
            'status' => $this->status,
        ]);

        $this->reset();
    }
}

