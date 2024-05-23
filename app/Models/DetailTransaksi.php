<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $fillable = [
        'id_barang', 'transaksi_id', 'qty', 'subtotal',
    ];

   public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
