<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Supplier; // Contoh model Supplier

class LaporanController extends Controller
{
    /**
     * Fungsi untuk menampilkan halaman laporan
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $produksis = Produksi::all();
        $penerimaans = Penerimaan::all();

        // Mengirimkan data ke view
        return view('contents.laporan', compact('suppliers', 'produksis', 'penerimaans'));
    }

    /**
     * Fungsi untuk mengekspor laporan ke Excel
     */
    public function export()
    {
        return Excel::download(new LaporanExport, 'laporan_harian_produksi.xlsx');
    }
}
