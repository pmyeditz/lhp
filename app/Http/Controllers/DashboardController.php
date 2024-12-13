<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Produksi;
use App\Models\Stock;
use App\Models\Laporan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSuppliers = Supplier::count();
        $totalProduksi = Produksi::count();
        $totalStock = Stock::count();
        $totalLaporan = Laporan::count();

        $chartData = [
            ['date' => '2024-06-01', 'open' => 100, 'close' => 110, 'high' => 115, 'low' => 95],
            ['date' => '2024-06-02', 'open' => 110, 'close' => 105, 'high' => 112, 'low' => 102],
            ['date' => '2024-06-03', 'open' => 105, 'close' => 115, 'high' => 120, 'low' => 104],
            ['date' => '2024-06-04', 'open' => 115, 'close' => 120, 'high' => 125, 'low' => 113],
        ];

        return view('dashboard', compact('totalSuppliers', 'totalProduksi', 'totalStock', 'totalLaporan', 'chartData'));
    }
}
