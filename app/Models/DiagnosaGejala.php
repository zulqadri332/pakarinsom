<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosaGejala extends Model
{
    use HasFactory;

    protected $table = 'diagnosa_gejala';

    protected $fillable = [
        'diagnosa_id',
        'gejala_id',
    ];
}
