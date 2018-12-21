<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
use App\Bencana;

class KriteriaKebutuhan extends Model
{
    protected $fillable = [
		'bencana_id', 'beras', 'air', 'bubur', 'obat', 'pembalut'
	];
	
    public function bencana()
    {
    	return $this->belongsTo(Bencana::class, 'bencana_id');
    }
}
