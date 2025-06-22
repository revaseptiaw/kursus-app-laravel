<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran'; // ubah dari 'pendaftarans'
    protected $fillable = ['kursus_id', 'peserta_id', 'status'];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
