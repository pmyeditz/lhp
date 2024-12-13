<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode_produksi',
        'tanggal_produksi',
        'cpo_diproduksi',
        'kernel_diproduksi',
        'ffa',
        'total_produksi',
    ];

    public function qualitas()
    {
        return $this->hasOne(Qualitas::class, 'id_produksi');
    }
}
