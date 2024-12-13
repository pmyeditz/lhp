<?php

namespace App\Exports;

use App\Models\StockJadi;
use Maatwebsite\Excel\Concerns\FromCollection;

class StockJadiSheet implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StockJadi::all();
    }
}
