<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatDonasi extends Model
{
	protected $fillable = [
    	'status_id', 'donasi_donatur_id'
    ];

    public function donasiDonatur()
	{
		return $this->belongsTo(DonasiDonatur::class, 'donasi_donatur_id');
	}

	public function status()
	{
		return $this->belongsTo(StatusDonasi::class, 'status_id');
	}
}
