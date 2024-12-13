<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_laporan',
        'total_diterima',
        'total_diproduksi',
        'total_dikirim',
        'catatan_kualitas',
    ];
}
