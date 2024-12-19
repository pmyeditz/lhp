<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Menampilkan halaman laporan penerimaan
     */
    public function index()
    {
        $start_date = request('start_date');

        if ($start_date) {
            $penerimaans = Penerimaan::with('pemasok')
                ->whereDate('tanggal_diterima', '=', $start_date)
                ->get();
        } else {
            $penerimaans = Penerimaan::with('pemasok')
                ->whereDate('tanggal_diterima', now()->toDateString())
                ->get();
        }

        return view('contents.laporan', [
            'penerimaans' => $penerimaans
        ]);
    }

    // pdf
    public function generatePDF(Request $request)
    {
        $startDate = $request->input('start_date', now()->toDateString());

        $penerimaans = Penerimaan::with('pemasok')
            ->whereDate('tanggal_diterima', $startDate)
            ->get();

        $pdf = Pdf::loadView('contents.laporan_pdf', compact('penerimaans'));

        return $pdf->download('laporan_penerimaan_' . $startDate . '.pdf');
    }




    /**
     * Mengekspor laporan ke file Excel
     */
    public function export()
    {
        return Excel::download(new LaporanExport, 'laporan_penerimaan.xlsx');
    }
}
