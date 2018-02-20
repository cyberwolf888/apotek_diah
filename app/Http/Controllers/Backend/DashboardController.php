<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $chart = '[';
        for($i=1; $i<=12; $i++){
            $_profit = \DB::table('penjualan')->select(\DB::Raw('SUM(total) as profit'))->whereRaw("MONTH(created_at) = ".$i)->get()[0]->profit;
            $profit = $_profit == '' ? 0 : $_profit;
            $chart.='['.'"'.strtoupper(date('M', strtotime('01-' . $i . '-2018'))).'",'.$profit.'],';
        }
        $chart = substr($chart, 0, -1).']';

        $total_penjualan = \DB::table('penjualan')->select(\DB::Raw('SUM(total) as profit'))->whereRaw("MONTH(created_at) = ".date('m'))->get()[0]->profit;
        $total_pembelian = \DB::table('pembelian')->select(\DB::Raw('SUM(total) as profit'))->whereRaw("MONTH(created_at) = ".date('m'))->get()[0]->profit;

        return view('backend.dashboard.index',[
            'chart'=>$chart,
            'total_penjualan'=>$total_penjualan,
            'total_pembelian'=>$total_pembelian
        ]);
    }
}
