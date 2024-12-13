<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Pemasok' => new PemasokSheet(),
        ];
    }
}
