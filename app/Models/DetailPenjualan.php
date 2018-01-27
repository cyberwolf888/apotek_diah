<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $table = "detail_penjualan";

    public function item()
    {
        return $this->belongsTo('App\Models\Item','item_id');
    }
}
