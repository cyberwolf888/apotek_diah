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
}
