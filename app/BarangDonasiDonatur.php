<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangDonasiDonatur extends Model
{
    protected $table = 'barang_donasi_donatur';

    protected $fillable = [
    	'donasi_donatur_id', 'barang_id', 'jumlah', 'donasi_id'
    ];

    public function donasiDonaturs()
    {
        return $this->belongsTo(DonasiDonatur::class, 'donasi_donatur_id');
    }

    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function donasi()
    {
        return $this->belongsTo(Donasi::class, 'donasi_id');
    }
}
