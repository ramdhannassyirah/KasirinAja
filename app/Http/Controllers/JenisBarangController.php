<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $JenisBarang = JenisBarang::all();
        $title = 'Jenis Barang';

        return view('admin.JenisBarang.detail', compact('JenisBarang', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not used
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        JenisBarang::create([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('JenisBarang.index')->with('success', 'Jenis Barang created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not used
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Not used
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenis = JenisBarang::findOrFail($id);

        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        $jenis->update([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('JenisBarang.index')->with('success', 'Jenis Barang updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis = JenisBarang::findOrFail($id);
        $jenis->delete();

        return redirect()->route('JenisBarang.index')->with('success', 'Jenis Barang deleted successfully.');
    }
}
