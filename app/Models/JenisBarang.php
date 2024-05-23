<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class JenisBarang extends Model
{
    use HasFactory;
    
    protected $table = 'jenis_barang';
    protected $primaryKey = 'id';


    protected $fillable = [
        'jenis','id',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class); 
    }
    
}
