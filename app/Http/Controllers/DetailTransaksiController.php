<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        $detailTransaksi = DetailTransaksi::with('barang')->get();
        $barang = Barang::all();
        return view('kasir.transaksi.add', compact('detailTransaksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksi,id',
            'id_barang' => 'required|exists:id,barang',
            'qty' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
        ]);

        $barang = Barang::findOrFail($request->id_barang);

        // Calculate subtotal
        $subtotal = $barang->harga * $request->qty;

        DetailTransaksi::create([
            'transaksi_id' => $request->transaksi_id,
            'id_barang' => $request->id_barang,
            'qty' => $request->qty,
            'subtotal' => $subtotal,
        ]);

        return redirect()->route('transaksi.create')->with('success', 'Detail Transaksi added successfully.');
    }
}
