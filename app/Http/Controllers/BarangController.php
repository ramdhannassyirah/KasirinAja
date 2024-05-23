<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;


use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $barang = Barang::with('jenisBarang')->get();
       $jenis = JenisBarang::all();
       $title = 'Barang';
       return view('admin.barang.barang', compact('barang' , 'title', 'jenis'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis_barang_id' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'jenis_barang_id' => $request->jenis_barang_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::find($id);
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,

        ]);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id )

    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
