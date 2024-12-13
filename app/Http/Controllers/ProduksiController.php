<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produksis = Produksi::all();
        return view('contents.produksi', compact('produksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contents.produksi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'kode_produksi' => 'required',
            'tanggal_produksi' => 'required|date',
            'cpo_diproduksi' => 'required|numeric',
            'kernel_diproduksi' => 'required|numeric',
            'ffa' => 'required|numeric',
        ]);

        try {
            // Hitung total produksi
            $total_produksi = $request->cpo_diproduksi + $request->kernel_diproduksi;

            // Simpan data produksi baru
            Produksi::create([
                'nama' => $request->nama,
                'kode_produksi' => $request->kode_produksi,
                'tanggal_produksi' => $request->tanggal_produksi,
                'cpo_diproduksi' => $request->cpo_diproduksi,
                'kernel_diproduksi' => $request->kernel_diproduksi,
                'ffa' => $request->ffa,
                'total_produksi' => $total_produksi,
            ]);

            return redirect()->route('produksis.index')->with('success', 'Data produksi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('produksis.index')->with('error', 'Gagal menambahkan data produksi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produksi = Produksi::findOrFail($id);
        return view('contents.produksi_show', compact('produksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produksi = Produksi::findOrFail($id);
        return view('contents.produksi_edit', compact('produksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'kode_produksi' => 'required|string',
            'tanggal_produksi' => 'required|date',
            'cpo_diproduksi' => 'required|numeric',
            'kernel_diproduksi' => 'required|numeric',
            'ffa' => 'required|numeric',
        ]);

        try {
            // Hitung total produksi
            $total_produksi = $request->cpo_diproduksi + $request->kernel_diproduksi;

            $produksi = Produksi::findOrFail($id);
            $produksi->update([
                'nama' => $request->nama,
                'kode_produksi' => $request->kode_produksi,
                'tanggal_produksi' => $request->tanggal_produksi,
                'cpo_diproduksi' => $request->cpo_diproduksi,
                'kernel_diproduksi' => $request->kernel_diproduksi,
                'ffa' => $request->ffa,
                'total_produksi' => $total_produksi,
            ]);

            return redirect()->route('produksis.index')->with('success', 'Data produksi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('produksis.index')->with('error', 'Gagal memperbarui data produksi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $produksi = Produksi::findOrFail($id);
            $produksi->delete();

            return redirect()->route('produksis.index')->with('success', 'Data produksi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('produksis.index')->with('error', 'Gagal menghapus data produksi.');
        }
    }
}
