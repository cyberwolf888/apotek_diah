<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = "penjualan";

    public function detail()
    {
        return $this->hasMany('App\Models\DetailPenjualan','penjualan_id');
    }

    public function suplier()
    {
        return $this->belongsTo('App\Models\Suplier','suplier_id');
    }
}
