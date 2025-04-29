<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'usia',
        'jenis_kelamin',
    ];

    // Relasi ke Diagnosa
    public function diagnosas()
    {
        return $this->hasMany(Diagnosa::class);
    }
}
