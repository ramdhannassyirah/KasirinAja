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
        return view('admin.JenisBarang.detail', compact('JenisBarang'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
