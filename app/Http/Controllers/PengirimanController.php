<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data pengiriman
        $pengirimans = Pengiriman::all();
        return view('contents.pengiriman', compact('pengirimans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contents.pengiriman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'jenis_produk' => 'required|string|max:255',
            'tanggal_pengiriman' => 'required|date',
            'berat_dikirim' => 'required|integer',
            'penerima' => 'required|string|max:255',
            'pengangkut' => 'required|string|max:255',
            'kode_pengiriman' => 'required|string|max:255',
        ]);

        // Menyimpan data pengiriman ke database
        Pengiriman::create($validated);

        return redirect()->route('pengiriman.index')->with('success', 'Data Pengiriman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        return view('contents.pengiriman.show', compact('pengiriman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        return view('contents.pengiriman.edit', compact('pengiriman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengiriman = Pengiriman::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'jenis_produk' => 'required|string|max:255',
            'tanggal_pengiriman' => 'required|date',
            'berat_dikirim' => 'required|integer',
            'penerima' => 'required|string|max:255',
            'pengangkut' => 'required|string|max:255',
            'kode_pengiriman' => 'required|string|max:255',
        ]);

        // Mengupdate data pengiriman
        $pengiriman->update($validated);

        return redirect()->route('pengiriman.index')->with('success', 'Data Pengiriman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        $pengiriman->delete();

        return redirect()->route('pengiriman.index')->with('success', 'Data Pengiriman berhasil dihapus.');
    }
}
