<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Penerimaan;
use App\Models\PenerimaanTbs;
use Carbon\Carbon;

class PenerimaanSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan penerimaan hari sebelumnya
        $penerimaan_sebelumnya = Penerimaan::whereDate('created_at', '=', now()->subDay()->toDateString())->first();
        $sd_hari_ini = $penerimaan_sebelumnya ? $penerimaan_sebelumnya->hari_ini : 0;

        // Membuat penerimaan baru
        $penerimaan = Penerimaan::create([
            'penerima' => 'KBI SP 1',
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'hari_ini' => 1000.00,
            'sd_hari_ini' => $sd_hari_ini,
        ]);

        // Menghitung nilai-nilai untuk penerimaan_tbs
        $total_penerimaan = $penerimaan->hari_ini + $penerimaan->sd_hari_ini;
        $jumlah_persediaan = $total_penerimaan * 1.1;
        $potongan = $total_penerimaan * 0.05;
        $tbs_proses_netto = $total_penerimaan - $potongan;
        $sisa_stock_akhir = $jumlah_persediaan - $tbs_proses_netto;

        // Menyimpan data penerimaan_tbs
        PenerimaanTbs::create([
            'penerimaan' => $penerimaan->id,
            'tanggal' => now(),
            'sisa_stock_awal' => $jumlah_persediaan,
            'total_penerimaan' => $total_penerimaan,
            'jumlah_persediaan' => $jumlah_persediaan,
            'potongan' => $potongan,
            'tbs_proses_netto' => $tbs_proses_netto,
            'sisa_stock_akhir' => $sisa_stock_akhir,
            'persen' => '10%', // Misal, diisi secara statis
        ]);

        // Tambahkan data lainnya jika diperlukan
        // Contoh data tambahan jika ada lebih dari satu penerimaan
        $penerimaan2 = Penerimaan::create([
            'penerima' => 'KBI SP 2',
            'tanggal' => Carbon::now()->subDay()->format('Y-m-d'),
            'hari_ini' => 1200.00,
            'sd_hari_ini' => 500.00,
        ]);

        // Lakukan perhitungan dan simpan data penerimaan_tbs untuk penerimaan 2
        $total_penerimaan2 = $penerimaan2->hari_ini + $penerimaan2->sd_hari_ini;
        $jumlah_persediaan2 = $total_penerimaan2 * 1.1;
        $potongan2 = $total_penerimaan2 * 0.05;
        $tbs_proses_netto2 = $total_penerimaan2 - $potongan2;
        $sisa_stock_akhir2 = $jumlah_persediaan2 - $tbs_proses_netto2;

        PenerimaanTbs::create([
            'penerimaan' => $penerimaan2->id,
            'tanggal' => now(),
            'sisa_stock_awal' => $jumlah_persediaan2,
            'total_penerimaan' => $total_penerimaan2,
            'jumlah_persediaan' => $jumlah_persediaan2,
            'potongan' => $potongan2,
            'tbs_proses_netto' => $tbs_proses_netto2,
            'sisa_stock_akhir' => $sisa_stock_akhir2,
            'persen' => '10%',
        ]);
    }
}
