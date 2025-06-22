<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ⬅ Tambahkan baris ini

class Kursus extends Model
{
    use HasFactory;
    protected $table = 'kursus';
    protected $fillable = ['nama_kursus', 'durasi', 'biaya', 'instruktur_id'];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
