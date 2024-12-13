<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk mengisi data supplier.
     *
     * @return void
     */
    public function run()
    {
        Supplier::insert([
            [
                'nama_pemasok' => 'KBI SP 1',
                'informasi_kontak' => '0812-3456-7890',
                'alamat' => 'Jl. Kebun Sawit No. 1',
            ],
            [
                'nama_pemasok' => 'TIGER',
                'informasi_kontak' => '0813-4567-8901',
                'alamat' => 'Jl. Harimau No. 2',
            ],
            [
                'nama_pemasok' => 'KBI MELONA',
                'informasi_kontak' => '0814-5678-9012',
                'alamat' => 'Jl. Melon Timur No. 3',
            ],
            [
                'nama_pemasok' => 'KBI ZED',
                'informasi_kontak' => '0815-6789-0123',
                'alamat' => 'Jl. Zed Barat No. 4',
            ],
            [
                'nama_pemasok' => 'NTS',
                'informasi_kontak' => '0816-7890-1234',
                'alamat' => 'Jl. Nusa Tenggara Selatan No. 5',
            ],
            [
                'nama_pemasok' => 'KBI ST 4',
                'informasi_kontak' => '0817-8901-2345',
                'alamat' => 'Jl. Sawit Timur No. 4',
            ],
            [
                'nama_pemasok' => 'KBI STP',
                'informasi_kontak' => '0818-9012-3456',
                'alamat' => 'Jl. Stasiun Pelabuhan No. 6',
            ],
            [
                'nama_pemasok' => 'KBI BI',
                'informasi_kontak' => '0819-0123-4567',
                'alamat' => 'Jl. Bukit Indah No. 7',
            ],
            [
                'nama_pemasok' => 'IWAN',
                'informasi_kontak' => '0820-1234-5678',
                'alamat' => 'Jl. Iwan Fals No. 8',
            ],
            [
                'nama_pemasok' => 'GARUDA',
                'informasi_kontak' => '0821-2345-6789',
                'alamat' => 'Jl. Garuda No. 9',
            ],
            [
                'nama_pemasok' => 'KBI ASF',
                'informasi_kontak' => '0822-3456-7890',
                'alamat' => 'Jl. Asfar Timur No. 10',
            ],
            [
                'nama_pemasok' => 'KBI TES',
                'informasi_kontak' => '0823-4567-8901',
                'alamat' => 'Jl. Testing Barat No. 11',
            ],
            [
                'nama_pemasok' => 'HOLILA',
                'informasi_kontak' => '0824-5678-9012',
                'alamat' => 'Jl. Holila Selatan No. 12',
            ],
            [
                'nama_pemasok' => 'KBI D2',
                'informasi_kontak' => '0825-6789-0123',
                'alamat' => 'Jl. Duku Dua No. 13',
            ],
            [
                'nama_pemasok' => 'KBI BG',
                'informasi_kontak' => '0826-7890-1234',
                'alamat' => 'Jl. Bangka No. 14',
            ],
            [
                'nama_pemasok' => 'KBI BUKIT JAYA',
                'informasi_kontak' => '0827-8901-2345',
                'alamat' => 'Jl. Bukit Jaya No. 15',
            ],
            [
                'nama_pemasok' => 'KBI KBP',
                'informasi_kontak' => '0828-9012-3456',
                'alamat' => 'Jl. Kampung Baru Pelabuhan No. 16',
            ],
            [
                'nama_pemasok' => 'TN',
                'informasi_kontak' => '0829-0123-4567',
                'alamat' => 'Jl. Taman Nasional No. 17',
            ],
        ]);
    }
}
