<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class ExportLaporanHarian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laporan:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export laporan harian ke dalam format Excel';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Menjalankan ekspor dan mendownload file Excel
        Excel::download(new LaporanExport, 'laporan_harian_produksi.xlsx');
        $this->info('Laporan Harian Produksi telah diekspor!');
    }
}
