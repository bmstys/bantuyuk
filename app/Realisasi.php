<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    protected $fillable = [
    	'nama_petugas', 'tanggal_realisasi', 'donasi_id', 'jumlah_realisasi'
    ];

    protected $dates = [
    	'tanggal_realisasi'
    ];

    public function donasis()
    {
        return $this->belongsTo(Donasi::class, 'donasi_id');
    }
}
