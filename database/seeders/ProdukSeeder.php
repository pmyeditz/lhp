<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'id_produk' => 1,
                'nama_produk' => 'CPO',
                'ffa' => null,
            ],
            [
                'id_produk' => 2,
                'nama_produk' => 'Kernel',
                'ffa' => null,
            ],
            [
                'id_produk' => 3,
                'nama_produk' => 'Cangkang',
                'ffa' => null,
            ],
        ]);
    }
}
