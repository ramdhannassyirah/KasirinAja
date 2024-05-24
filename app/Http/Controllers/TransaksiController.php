<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Log;

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
        $barang = Barang::all();
        return view('kasir.transaksi.add', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_transaksi' => 'required',
            'tgl_transaksi' => 'required|date',
            'total_bayar' => 'required',
            'uang_pembeli' => 'required',
            'kembalian' => 'required',
            'details' => 'required|string', // Validate details as string
        ]);

        // Ambil data dari request
        $data = $request->all();
        
        // Decode details JSON
        $details = json_decode($data['details'], true);
        
        // Log data request
        Log::info('Data request:', $data);
        
        // Simpan transaksi ke database
        $transaksi = Transaksi::create([
            'no_transaksi' => $data['no_transaksi'],
            'tgl_transaksi' => $data['tgl_transaksi'],
            'total_bayar' => $data['total_bayar'],
            'uang_pembeli' => $data['uang_pembeli'],
            'kembalian' => $data['kembalian']
        ]);

        // Log transaksi
        Log::info('Transaksi created:', $transaksi->toArray());

        // Loop melalui detail transaksi
        foreach ($details as $detail) {
            
            // Update stok
            $barang = Barang::find($detail['id_barang']);
            $barang->stok -= $detail['qty'];
            $barang->save();

            // Simpan detail transaksi ke database
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $detail['id_barang'],
                'qty' => $detail['qty'],
                'subtotal' => $detail['subtotal']
            ]);
        }

        // Redirect atau response lainnya
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }
}

