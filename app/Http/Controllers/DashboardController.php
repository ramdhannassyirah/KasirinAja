<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $transaksiHariIni = Transaksi::whereDate('created_at', Carbon::today())->count();
        $dataBarang = Barang::count();
        $dataTransaksi = Transaksi::count();
        $jumlahPendapatan = Transaksi::sum('total_bayar');
        $barang = Barang::all();

        return view('dashboard', compact('transaksiHariIni', 'dataBarang', 'dataTransaksi', 'jumlahPendapatan', 'barang'));
    }
}
