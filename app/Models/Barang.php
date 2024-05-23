<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisBarang;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
   
    

    protected $fillable = [
     'nama_barang','id','harga', 'stok','jenis_barang_id',
    ];

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }

    public function Transaksi(){
        return $this->hasMany(Transaksi::class);
    }
    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksi::class);
    }
   

}
