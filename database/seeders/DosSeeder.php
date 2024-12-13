<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dos; // Pastikan model Dos sudah ada

class DosSeeder extends Seeder
{
    public function run()
    {
        // Membuat data DO (Delivery Order)
        Dos::create([
            'nama' => 'KBI SP 1',
            'no_do' => 'DO001',
            'tanggal_do' => now()->toDateString(),
            'status' => 'aktif',
            'keterangan' => 'Keterangan untuk DO pertama',
        ]);

        Dos::create([
            'nama' => 'KBI SP 2',
            'no_do' => 'DO002',
            'tanggal_do' => now()->subDays(1)->toDateString(),  // Tanggal sehari sebelumnya
            'status' => 'aktif',
            'keterangan' => 'Keterangan untuk DO kedua',
        ]);

        Dos::create([
            'nama' => 'KBI SP 3',
            'no_do' => 'DO003',
            'tanggal_do' => now()->subDays(2)->toDateString(),  // Tanggal dua hari sebelumnya
            'status' => 'nonaktif',
            'keterangan' => 'Keterangan untuk DO ketiga',
        ]);
    }
}
