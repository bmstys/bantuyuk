<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\DonasiDonatur;
use App\Bencana;

class Donasi extends Model
{
    protected $fillable = [
    	'bencana_id', 'open', 'close', 'total'
    ];

    protected $dates = [
    	'open', 'close'
    ];

    public function donasiDonaturs()
    {
        return $this->hasMany(DonasiDonatur::class, 'donasi_id');
    }

    public function bencana()
    {
        return $this->belongsTo(Bencana::class, 'bencana_id');
    }

    public function barangDonasiDonaturs()
    {
        return $this->hasMany(BarangDonasiDonatur::class, 'donasi_id');
    }

    public function realisasis()
    {
        return $this->hasMany(Realisasi::class, 'donasi_id');
    }
}
