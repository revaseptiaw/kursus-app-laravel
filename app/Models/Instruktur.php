<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instruktur extends Model
{
    use HasFactory;

    protected $table = 'instrukturs';

    protected $fillable = ['nama', 'email'];


    public function kursus()
    {
        return $this->hasMany(Kursus::class);
    }
}

