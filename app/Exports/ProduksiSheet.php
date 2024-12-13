<?php

namespace App\Exports;

use App\Models\Produksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduksiSheet implements FromCollection
{
    public function collection()
    {
        // Ambil data produksi dari database
        $produksi = Produksi::all();

        $data = [];

        foreach ($produksi as $index => $produksiItem) {
            // Hitung nilai Hari Ini dan S/D Hari Ini untuk Produksi
            $hariIniProduksi = $produksiItem->cpo_diproduksi;  // Sesuaikan dengan kolom yang relevan
            $sdHariIniProduksi = Produksi::whereDate('tanggal_produksi', '<=', today())
                ->sum('cpo_diproduksi');

            $data[] = [
                'No' => $index + 1,
                'Tanggal Produksi' => $produksiItem->tanggal_produksi,
                'Hari Ini (Value)' => $hariIniProduksi,
                'S/D Hari Ini (Value)' => $sdHariIniProduksi,
            ];
        }

        return collect($data);
    }
}
