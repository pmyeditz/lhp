<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualitas extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_produksi',
        'ffa',
        'kadar_air',
        'kotoran',
    ];

    // Tentukan nama tabel yang benar
    protected $table = 'qualitases';

    public function produksi()
    {
        return $this->belongsTo(Produksi::class, 'id_produksi');
    }
}
