<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
use App\DonasiDonatur;

class StatusDonasi extends Model
{
    protected $fillable = [
    	'nama_status', 'keterangan'
    ];

    public function donasiDonaturs()
    {
        return $this->belongsTo(DonasiDonatur::class, 'status_id');
    }

    public function riwayatDonasi()
    {
        return $this->belongsTo(DonasiDonatur::class, 'status_id');
    }
}
