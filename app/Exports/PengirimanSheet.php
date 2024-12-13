<?php

namespace App\Exports;

use App\Models\Pengiriman;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengirimanSheet implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengiriman::all();
    }
}
