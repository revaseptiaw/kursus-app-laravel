<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta'; // ubah dari 'pesertas'
    protected $fillable = ['nama', 'email'];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
