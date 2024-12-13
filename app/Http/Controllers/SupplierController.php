<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('contents.suplier', compact('suppliers'));
    }


    public function create()
    {
        // Menampilkan form untuk tambah Supplier
        return view('contents.supplier_create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_pemasok' => 'required|string|max:255',
            'informasi_kontak' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);


        Supplier::create($request->all());


        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function show(Supplier $supplier)
    {
        return view('contents.supplier_show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('contents.supplier_edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama_pemasok' => 'required|string|max:255',
            'informasi_kontak' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
