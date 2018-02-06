<?php

namespace App\Http\Controllers\Backend;

use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function penjualan()
    {
        return view('backend.laporan.priod_penjualan');
    }

    public function result_penjualan(Request $request)
    {
        $start_date = date('Y/m/d', strtotime($request->start_date));
        $end_date = date('Y/m/d', strtotime($request->end_date));

        $model = Penjualan::whereRaw('created_at>="'.$start_date.'"')->whereRaw('created_at<="'.$end_date.'"')->orderBy('created_at','DESC')->get();

        return view('backend.laporan.result_penjualan',['model'=>$model]);
    }

    public function pembelian()
    {
        return view('backend.laporan.priod_pembelian');
    }

    public function result_pembelian(Request $request)
    {
        $start_date = date('Y/m/d', strtotime($request->start_date));
        $end_date = date('Y/m/d', strtotime($request->end_date));

        $model = Pembelian::whereRaw('created_at>="'.$start_date.'"')->whereRaw('created_at<="'.$end_date.'"')->orderBy('created_at','DESC')->get();

        return view('backend.laporan.result_pembelian',['model'=>$model]);
    }
}
