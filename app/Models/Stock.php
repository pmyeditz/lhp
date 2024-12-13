<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_produk',
        'stok_awal',
        'stok_akhir',
    ];

    public function stockJadi()
    {
        return $this->hasOne(StockJadi::class, 'id_stock');
    }
}
