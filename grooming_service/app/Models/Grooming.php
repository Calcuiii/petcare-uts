<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grooming extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_hewan',
        'jenis_hewan', 
        'umur',
        'layanan',
        'harga',
        'tanggal',
        'jam',
        'nama_pemilik',
        'no_hp'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam' => 'datetime:H:i',
        'harga' => 'integer'
    ];
}