<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = [
        'nama_pemasok',
        'informasi_kontak',
        'alamat',
    ];

    // Pada model Produksi
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function penerimaans()
    {
        return $this->hasMany(Penerimaan::class, 'id_pemasok');
    }
}
