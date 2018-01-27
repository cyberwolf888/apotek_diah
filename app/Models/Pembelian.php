<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = "pembelian";

    public function suplier()
    {
        return $this->belongsTo('App\Models\Suplier','suplier_id');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\DetailPembelian','pembelian_id');
    }
}
