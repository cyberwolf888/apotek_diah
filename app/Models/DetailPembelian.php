<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    protected $table = "detail_pembelian";

    public function item()
    {
        return $this->belongsTo('App\Models\Item','item_id');
    }
}
