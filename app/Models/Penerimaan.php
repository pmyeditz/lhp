<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pemasok',
        'kode_penerimaan',
        'tanggal_diterima',
        'berat_diterima',
    ];

    public function pemasok()
    {
        return $this->belongsTo(Supplier::class, 'id_pemasok');
    }
}
