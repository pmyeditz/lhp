<?php

namespace App\Http\Controllers;

use App\Models\StockJadi;
use Illuminate\Http\Request;

class StockJadiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data StockJadi
        $stockJadis = StockJadi::all();
        return view('contents.stockJadi', compact('stockJadis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat StockJadi baru
        return view('contents.createStockJadi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_produk' => 'required|string',
            'stok_akhir' => 'required|integer',
        ]);

        // Simpan data StockJadi baru
        StockJadi::create([
            'jenis_produk' => $request->jenis_produk,
            'stok_akhir' => $request->stok_akhir,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('stockJadi.index')->with('success', 'Stock Jadi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan detail StockJadi berdasarkan id
        $stockJadi = StockJadi::findOrFail($id);
        return view('contents.showStockJadi', compact('stockJadi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form edit StockJadi
        $stockJadi = StockJadi::findOrFail($id);
        return view('contents.editStockJadi', compact('stockJadi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'jenis_produk' => 'required|string',
            'stok_akhir' => 'required|integer',
        ]);

        // Cari data StockJadi
        $stockJadi = StockJadi::findOrFail($id);
        $stockJadi->update([
            'jenis_produk' => $request->jenis_produk,
            'stok_akhir' => $request->stok_akhir,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('stockJadi.index')->with('success', 'Stock Jadi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari dan hapus data StockJadi
        $stockJadi = StockJadi::findOrFail($id);
        $stockJadi->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('stockJadi.index')->with('success', 'Stock Jadi berhasil dihapus!');
    }
}
