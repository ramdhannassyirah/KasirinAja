<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $primaryKey = 'id_produk';
    protected $fillable = ['nama_produk', 'id_kategori', 'harga', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

}