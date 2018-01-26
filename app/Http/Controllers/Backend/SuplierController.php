<?php

namespace App\Http\Controllers\Backend;

use App\Models\Suplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Suplier::all();
        return view('backend.suplier.manage',['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Suplier();
        return view('backend.suplier.form',['model'=>$model]);
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
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'status' => 'required'
        ]);

        $model = new Suplier();
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->telp = $request->telp;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.suplier.manage');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Suplier::find($id);
        return view('backend.suplier.form',['model'=>$model,'update'=>1]);
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
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'status' => 'required'
        ]);

        $model = Suplier::find($id);
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->telp = $request->telp;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('backend.suplier.manage');
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
