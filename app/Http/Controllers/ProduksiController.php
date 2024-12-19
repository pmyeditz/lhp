<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    public function index()
    {
        $produksis = Produksi::all();
        return view('contents.produksi', compact('produksis'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah produksi
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|max:20',
            'kode_produksi' => 'required|max:10',
            'tanggal_produksi' => 'required|date',
            'cpo_diproduksi' => 'required|integer',
            'kernel_diproduksi' => 'required|integer',
            'ffa' => 'required|max:12',
            'total_produksi' => 'required|integer',
        ]);

        // Menyimpan data produksi ke database
        Produksi::create([
            'nama' => $request->nama,
            'kode_produksi' => $request->kode_produksi,
            'tanggal_produksi' => $request->tanggal_produksi,
            'cpo_diproduksi' => $request->cpo_diproduksi,
            'kernel_diproduksi' => $request->kernel_diproduksi,
            'ffa' => $request->ffa,
            'total_produksi' => $request->total_produksi,
        ]);

        // Redirect ke halaman produksi setelah berhasil menambah
        return redirect()->route('produksis.index')->with('success', 'Produksi berhasil ditambahkan.');
    }

    public function edit(Produksi $produksi)
    {
        return view('contents.edit-produksi', compact('produksi'));
    }

    public function update(Request $request, Produksi $produksi)
    {
        $request->validate([
            'nama' => 'required|max:20',
            'kode_produksi' => 'required|max:10',
            'tanggal_produksi' => 'required|date',
            'cpo_diproduksi' => 'required|integer',
            'kernel_diproduksi' => 'required|integer',
            'ffa' => 'required|max:12',
            'total_produksi' => 'required|integer',
        ]);

        // Update data produksi
        $produksi->update([
            'nama' => $request->nama,
            'kode_produksi' => $request->kode_produksi,
            'tanggal_produksi' => $request->tanggal_produksi,
            'cpo_diproduksi' => $request->cpo_diproduksi,
            'kernel_diproduksi' => $request->kernel_diproduksi,
            'ffa' => $request->ffa,
            'total_produksi' => $request->total_produksi,
        ]);

        return redirect()->route('produksis.index')->with('success', 'Produksi berhasil diperbarui.');
    }

    public function destroy(Produksi $produksi)
    {
        // Menghapus data produksi
        $produksi->delete();

        return redirect()->route('produksis.index')->with('success', 'Produksi berhasil dihapus.');
    }
}
