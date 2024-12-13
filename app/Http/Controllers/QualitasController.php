<?php

namespace App\Http\Controllers;

use App\Models\Qualitas;
use App\Models\Produksi;  // Pastikan model Produksi di-import
use Illuminate\Http\Request;

class QualitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualitases = Qualitas::all();
        $produksis = Produksi::all();  // Ambil semua data Produksi
        return view('contents.qualitas', compact('qualitases', 'produksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_produksi' => 'required|exists:produksis,id',
            'ffa' => 'required|numeric',
            'kadar_air' => 'required|numeric',
            'kotoran' => 'required|numeric',
        ]);

        Qualitas::create([
            'id_produksi' => $request->id_produksi,
            'ffa' => $request->ffa,
            'kadar_air' => $request->kadar_air,
            'kotoran' => $request->kotoran,
        ]);

        return redirect()->route('qualitases.index')->with('success', 'Data Qualitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $qualitas = Qualitas::findOrFail($id);
        $produksis = Produksi::all();
        return view('contents.qualitas_edit', compact('qualitas', 'produksis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_produksi' => 'required|exists:produksis,id',
            'ffa' => 'required|numeric',
            'kadar_air' => 'required|numeric',
            'kotoran' => 'required|numeric',
        ]);

        $qualitas = Qualitas::findOrFail($id);
        $qualitas->update([
            'id_produksi' => $request->id_produksi,
            'ffa' => $request->ffa,
            'kadar_air' => $request->kadar_air,
            'kotoran' => $request->kotoran,
        ]);

        return redirect()->route('qualitases.index')->with('success', 'Data Qualitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qualitas = Qualitas::findOrFail($id);
        $qualitas->delete();

        return redirect()->route('qualitases.index')->with('success', 'Data Qualitas berhasil dihapus.');
    }
}
