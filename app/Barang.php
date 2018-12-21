<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
    	'nama_barang', 'satuan', 'harga'
    ];

    // public function getHargaRupiahAttribute()
    // {
    // 	return 'Rp. '.strrev(implode('.',str_split(strrev(strval($this->harga)),3)));
    // }
}
