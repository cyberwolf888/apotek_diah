<?php

namespace App\Http\Controllers\Backend;

use App\Models\DetailPembelian;
use App\Models\Item;
use App\Models\Pembelian;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Pembelian::all();
        return view('backend.pembelian.manage',['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Pembelian();
        return view('backend.pembelian.form',['model'=>$model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'suplier_id' => 'required',
            'faktur' => 'required|max:100',
            'total' => 'required|max:11|alpha_num'
        ]);

        $model = new Pembelian();
        $model->suplier_id = $request->suplier_id;
        $model->user_id = \Auth::user()->id;
        $model->tgl = date('Y-m-d',strtotime($request->tgl));
        $model->faktur = $request->faktur;
        $model->keterangan = $request->keterangan;
        $model->total = $request->total;
        $model->save();

        foreach ($request->item_id as $key=>$item)
        {
            $mItem = Item::find($item);
            $detail = new DetailPembelian();
            $detail->pembelian_id = $model->id;
            $detail->item_id = $item;
            $detail->harga = $request->harga[$key];
            $detail->qty = $request->qty[$key];
            $detail->save();

            $mItem->stock = $mItem->stock+$request->qty[$key];
            $mItem->save();
        }

        return redirect()->route('backend.pembelian.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Pembelian::find($id);

        return view('backend.pembelian.detail',['model'=>$model]);
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
}
