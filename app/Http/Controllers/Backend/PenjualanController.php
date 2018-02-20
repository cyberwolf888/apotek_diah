<?php

namespace App\Http\Controllers\Backend;

use App\Models\DetailPenjualan;
use App\Models\Item;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Penjualan::orderBy('id','DESC')->get();
        return view('backend.penjualan.manage',['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Cart::instance('cart')->destroy();
        $model = new Penjualan();
        return view('backend.penjualan.form',['model'=>$model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Penjualan();
        $cart = \Cart::instance('cart');

        $model->user_id = \Auth::user()->id;
        $model->tgl = date('Y-m-d');
        $model->total = $cart->total(0,'','');
        $model->keterangan = $request->keterangan;
        $model->save();

        foreach ($cart->content() as $row)
        {
            $detail = new DetailPenjualan();
            $detail->penjualan_id = $model->id;
            $detail->item_id = $row->id;
            $detail->qty = $row->qty;
            $detail->harga = $row->price;
            $detail->total = $row->qty*$row->price;
            $detail->save();

            $item = Item::find($row->id);
            $item->stock = $item->stock-$row->qty;
            $item->save();
        }

        $cart->destroy();

        return redirect()->route('backend.penjualan.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Penjualan::find($id);

        return view('backend.penjualan.detail',['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function add_item(Request $request)
    {
        $item = Item::find($request->item_id);
        if($item->stock < $request->qty){
            return response()->json(['status'=>0,'stock'=>$item->stock]);
        }
        \Cart::instance('cart')->add($item->id, $item->nama, $request->qty, $item->harga)->associate('App\Models\Item');

        return response()->json(['status'=>1,'item'=>$item->toArray(),'qty'=>$request->qty,'total'=>\Cart::instance('cart')->total(0,'','')]);
    }
}
