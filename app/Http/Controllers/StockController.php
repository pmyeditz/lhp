<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data stock dari database
        $stocks = Stock::all();
        return view('contents.stock', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah data
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_produk' => 'required|string|max:255',
            'stok_awal' => 'required|numeric',
            'stok_akhir' => 'required|numeric',
        ]);

        try {
            // Simpan data stock baru
            Stock::create([
                'jenis_produk' => $request->jenis_produk,
                'stok_awal' => $request->stok_awal,
                'stok_akhir' => $request->stok_akhir,
            ]);

            return redirect()->route('stocks.index')->with('success', 'Data stock berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('stocks.index')->with('error', 'Gagal menambahkan data stock.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stock = Stock::findOrFail($id);
        return view('contents.stock-show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit data stock
        $stock = Stock::findOrFail($id);
        return view('contents.stock-edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'jenis_produk' => 'required|string|max:255',
            'stok_awal' => 'required|numeric',
            'stok_akhir' => 'required|numeric',
        ]);

        try {
            $stock = Stock::findOrFail($id);
            $stock->update([
                'jenis_produk' => $request->jenis_produk,
                'stok_awal' => $request->stok_awal,
                'stok_akhir' => $request->stok_akhir,
            ]);

            return redirect()->route('stocks.index')->with('success', 'Data stock berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('stocks.index')->with('error', 'Gagal memperbarui data stock.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $stock = Stock::findOrFail($id);
            $stock->delete();

            return redirect()->route('stocks.index')->with('success', 'Data stock berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('stocks.index')->with('error', 'Gagal menghapus data stock.');
        }
    }
}
