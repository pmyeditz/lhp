<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockJadi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_produk',
        'stok_akhir',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'id_stock');
    }
}
