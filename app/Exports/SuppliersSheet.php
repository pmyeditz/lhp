<?php

namespace App\Exports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuppliersSheet implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Supplier::all(['id', 'nama_pemasok', 'informasi_kontak', 'alamat']);
    }

    public function headings(): array
    {
        return ['ID', 'Nama Pemasok', 'Informasi Kontak', 'Alamat'];
    }
}
