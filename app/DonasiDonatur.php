<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Donasi;

class DonasiDonatur extends Model
{
    protected $fillable = [
    	'nominal', 'jenis', 'donasi_id', 'user_id', 'status_id'
    ];

    protected $dates = [
        'created_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $total = Donasi::find($model->donasi_id)->total;
            $model->donasi->update(['total' => $total + $model->nominal]);
        });

        static::saved(function ($model) {
            $model->riwayatDonasi()->create([
                'status_id' => $model->status_id
            ]);
        });
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function donasi()
    {
    	return $this->belongsTo(Donasi::class, 'donasi_id');
    }

    public function status()
    {
        return $this->hasOne(StatusDonasis::class, 'status_id');
    }

    public function riwayatDonasi() 
    {
        return $this->hasMany(RiwayatDonasi::class, 'donasi_donatur_id');
    }

    public function barangs()
    {
        // if ($this->jenis == 'barang') 
        // {
            return $this->belongsToMany(Barang::class)->withPivot('jumlah','id');
        // }
    }

    public function barangDonasiDonaturs()
    {
        return $this->hasMany(BarangDonasiDonatur::class, 'donasi_donatur_id');
    }
}
