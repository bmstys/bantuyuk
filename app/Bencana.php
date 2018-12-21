<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
use App\Donasi;
use App\Kebutuhan;
use App\KriteriaKebutuhan;

class Bencana extends Model
{
    protected $fillable = [
    	'nama', 'tanggal', 'lokasi', 'jml_korban', 'gambar_bencana', 'prioritas'
    ];

    protected $dates = [
    	'tanggal',
    ];

    public function donasis()
    {
    	return $this->hasMany(Donasi::class, 'bencana_id');
    }

    public function kebutuhans()
    {
        return $this->hasMany(Kebutuhan::class, 'bencana_id');
    }

    public function kriteria_kebutuhans()
    {
        return $this->hasOne(KriteriaKebutuhan::class, 'bencana_id');
    }
}
