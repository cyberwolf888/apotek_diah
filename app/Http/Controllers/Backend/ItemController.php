<?php

namespace App\Http\Controllers\Backend;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Item::orderBy('id','DESC')->get();
        return view('backend.item.manage',['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Item();
        return view('backend.item.form',['model'=>$model]);
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
            'satuan_id' => 'required',
            'nama' => 'required|max:100',
            'stock' => 'required|max:11|alpha_num',
            'harga' => 'required|max:11|alpha_num',
            'image' => 'required|image|max:3500',
            'jenis' => 'required|max:11|alpha_num',
        ]);

        $path = base_path('assets/img/items/');
        $file = \Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');

        $model = new Item();
        $model->satuan_id = $request->satuan_id;
        $model->user_id = \Auth::user()->id;
        $model->nama = $request->nama;
        $model->stock = $request->stock;
        $model->harga = $request->harga;
        $model->gambar = $file->basename;
        $model->jenis = $request->jenis;
        $model->save();

        return redirect()->route('backend.item.manage');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Item::find($id);
        return view('backend.item.form',['model'=>$model,'update'=>1]);
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
        $this->validate($request, [
            'satuan_id' => 'required',
            'nama' => 'required|max:100',
            'stock' => 'required|max:11|alpha_num',
            'harga' => 'required|max:11|alpha_num',
            'image' => 'image|max:3500',
            'jenis' => 'required|max:11|alpha_num',
        ]);

        $model = Item::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = base_path('assets/img/items/');
            if(is_file($path.$model->gambar)){
                unlink($path.$model->gambar);
            }
            $file = \Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $model->gambar = $file->basename;
        }

        $model->satuan_id = $request->satuan_id;
        $model->user_id = \Auth::user()->id;
        $model->nama = $request->nama;
        $model->stock = $request->stock;
        $model->harga = $request->harga;
        $model->jenis = $request->jenis;
        $model->save();

        return redirect()->route('backend.item.manage');
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
