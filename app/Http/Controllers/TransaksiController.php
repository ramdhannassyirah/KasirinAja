<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('barang', 'detailTransaksi')->get();
        $barang = Barang::with('detailTransaksi')->get();
       
        return view('kasir.transaksi.list', compact('transaksi', 'barang'));
    }

    public function create()
    {
        $transaksi = Transaksi::with('barang','detailTransaksi')->get();
        $barang = Barang::with('detailTransaksi')->get();
        return view('kasir.transaksi.add', compact('transaksi', 'barang'));


    }

    public function store(Request $request)
    {

        
        $transaksi = new Transaksi();
        $transaksi->id_barang = $request->id_barang;
        $transaksi->total_bayar = $request->total_bayar;
        $transaksi->no_transaksi = $request->no_transaksi;
        $transaksi->tgl_transaksi = $request->tgl_transaksi;
        $transaksi->total_bayar = $request->total_bayar;
        $transaksi->uang_pembeli = $request->uang_pembeli;
        $transaksi->kembalian = $request->kembalian;
        $transaksi->save();

    
        return redirect('/transaksi')->with('success', 'Transaksi Berhasil Ditambahkan');
    }
    
}


