<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('detailTransaksi.barang')->get();
        return view('kasir.transaksi.list', compact('transaksi'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('kasir.transaksi.add', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_transaksi' => 'required|string',
            'tgl_transaksi' => 'required|date',
            'uang_pembeli' => 'required|numeric|min:0',
            'id_barang' => 'required|array',
            'id_barang.*' => 'exists:barang,id',
            'qyt' => 'required|array',
            'qyt.*' => 'integer|min:1',
        ]);

        $transaksi = Transaksi::create([
            'no_transaksi' => $request->no_transaksi,
            'tgl_transaksi' => $request->tgl_transaksi,
            'uang_pembeli' => $request->uang_pembeli,
            'total_bayar' => 0,
            'kembalian' => 0,
        ]);

        $total_bayar = 0;

        foreach ($request->id_barang as $key => $id_barang) {
            $barang = Barang::find($id_barang);
            $qyt = $request->qyt[$key];
            $subtotal = $barang->harga * $qyt;
            $total_bayar += $subtotal;

            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'id_barang' => $id_barang,
                'qty' => $qyt,
                'subtotal' => $subtotal,
            ]);
        }

        $transaksi->update([
            'total_bayar' => $total_bayar,
            'kembalian' => $request->uang_pembeli - $total_bayar,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show($no_transaksi)
    {
        $transaksi = Transaksi::with('detailTransaksi.barang')->where('no_transaksi', $no_transaksi)->first();
        return view('kasir.transaksi.show', compact('transaksi'));
    }
}
