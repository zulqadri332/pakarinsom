<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'tipe',
    ];

    // Relasi ke Diagnosa (pivot)
    public function diagnosas()
    {
        return $this->belongsToMany(Diagnosa::class, 'diagnosa_gejala');
    }
}
