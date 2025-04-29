<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'hasil',
        'probabilitas_primer',
        'probabilitas_sekunder',
        'probabilitas_tidak',
    ];

    // Relasi ke Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // Relasi ke Gejala (pivot)
    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'diagnosa_gejala');
    }
}
