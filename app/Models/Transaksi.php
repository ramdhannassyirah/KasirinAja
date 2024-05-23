<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaksi;
use App\Models\Barang;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
 

    protected $fillable = [
        'no_transaksi',
        'id_barang',
        'tgl_transaksi',
        'total_bayar',
        'kembalian',
        'uang_pembeli'
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    
}
