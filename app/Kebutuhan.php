<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
use App\Bencana;

class Kebutuhan extends Model
{
	protected $fillable = [
		'bencana_id', 'nama_kebutuhan', 'satuan', 'jumlah'
	];
	
    public function bencana()
    {
    	return $this->belongsTo(Bencana::class, 'bencana_id');
    }
}
