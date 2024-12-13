<?php

namespace App\Exports;

use App\Models\Qualitas;
use Maatwebsite\Excel\Concerns\FromCollection;

class QualitasSheet implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Qualitas::all();
    }
}
