<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengiriman';
    protected $fillable = [
        'jenis_produk',
        'tanggal_pengiriman',
        'berat_dikirim',
        'penerima',
        'pengangkut',
        'kode_pengiriman',
    ];
}
