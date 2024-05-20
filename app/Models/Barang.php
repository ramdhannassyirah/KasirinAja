<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    

    protected $fillable = [
     'nama_barang', 'harga', 'stok',
    ];

    public function transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_barang');
    }
}
