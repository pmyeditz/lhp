<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerimaans = Penerimaan::with('pemasok')->get();
        $suppliers = Supplier::all();

        return view('contents.penerimaan', compact('penerimaans', 'suppliers'));
    }

    /**
     * Generate Kode Penerimaan secara otomatis
     */
    public function generateKodePenerimaan()
    {
        // Ambil kode penerimaan terakhir
        $lastPenerimaan = Penerimaan::latest('id')->first();

        if ($lastPenerimaan) {
            $lastKode = $lastPenerimaan->kode_penerimaan;
            $lastNumber = (int) substr($lastKode, 3);
            $newKode = 'KPN' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newKode = 'KPN001';
        }

        return $newKode;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pemasok' => 'required|exists:suppliers,id',
            'tanggal_diterima' => 'required|date',
            'berat_diterima' => 'required|numeric',
        ]);

        try {
            $kodePenerimaan = $this->generateKodePenerimaan();

            Penerimaan::create([
                'id_pemasok' => $request->id_pemasok,
                'kode_penerimaan' => $kodePenerimaan,
                'tanggal_diterima' => $request->tanggal_diterima,
                'berat_diterima' => $request->berat_diterima,
            ]);

            return redirect()->route('penerimaans.index')->with('success', 'Data penerimaan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('penerimaans.index')->with('error', 'Gagal menambahkan data penerimaan.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_penerimaan' => 'required|unique:penerimaans,kode_penerimaan,' . $id,
            'tanggal_diterima' => 'required|date',
            'berat_diterima' => 'required|numeric',
        ]);

        try {
            $penerimaan = Penerimaan::findOrFail($id);
            $penerimaan->update([
                'kode_penerimaan' => $request->kode_penerimaan,
                'tanggal_diterima' => $request->tanggal_diterima,
                'berat_diterima' => $request->berat_diterima,
            ]);

            return redirect()->route('penerimaans.index')->with('success', 'Data penerimaan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('penerimaans.index')->with('error', 'Gagal memperbarui data penerimaan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $penerimaan = Penerimaan::findOrFail($id);
            $penerimaan->delete();

            return redirect()->route('penerimaans.index')->with('success', 'Data penerimaan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('penerimaans.index')->with('error', 'Gagal menghapus data penerimaan.');
        }
    }
}
