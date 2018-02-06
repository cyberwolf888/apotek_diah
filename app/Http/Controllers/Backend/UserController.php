<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Pemilik Fucntion
    |--------------------------------------------------------------------------
    */
    public function owner()
    {
        $model = User::where('type',2)->orderBy('id','desc')->get();
        return view('backend/user/owner',[
            'model'=>$model
        ]);
    }

    public function create_owner()
    {
        $model = new User();
        return view('backend/user/form_owner',[
            'model'=>$model
        ]);
    }

    public function store_owner(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
        ]);

        $model = new User();
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->address = $request->address;
        $model->password = bcrypt($request->password);
        $model->type = 2;
        $model->isActive = $request->status;
        $model->save();

        return redirect()->route('backend.user.owner.manage');
    }

    public function show_operator($id)
    {
        //
    }

    public function edit_owner($id)
    {
        $model = User::findOrFail($id);
        return view('backend/user/form_owner',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update_owner(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
        ]);

        $model = User::findOrFail($id);
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->address = $request->address;
        $model->password = bcrypt($request->password);
        $model->isActive = $request->status;
        $model->save();

        return redirect()->route('backend.user.owner.manage');
    }



    /*
    |--------------------------------------------------------------------------
    | Admin Fucntion
    |--------------------------------------------------------------------------
    */
    public function admin()
    {
        $model = User::where('type',1)->orderBy('id','desc')->get();
        return view('backend/user/admin',[
            'model'=>$model
        ]);
    }

    public function create_admin()
    {
        $model = new User();
        return view('backend/user/form_admin',[
            'model'=>$model
        ]);
    }

    public function store_admin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
        ]);

        $model = new User();
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->address = $request->address;
        $model->password = bcrypt($request->password);
        $model->type = 1;
        $model->isActive = $request->status;
        $model->save();

        return redirect()->route('backend.user.admin.manage');
    }

    public function show_admin($id)
    {
        //
    }

    public function edit_admin($id)
    {
        $model = User::findOrFail($id);
        return view('backend/user/form_admin',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update_admin(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
        ]);

        $model = User::findOrFail($id);
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->address = $request->address;
        $model->password = bcrypt($request->password);
        $model->isActive = $request->status;
        $model->save();

        return redirect()->route('backend.user.admin.manage');
    }


    /*
    |--------------------------------------------------------------------------
    | Karyawan Fucntion
    |--------------------------------------------------------------------------
    */
    public function karyawan()
    {
        $model = User::where('type',3)->orderBy('id','desc')->get();
        return view('backend/user/karyawan',[
            'model'=>$model
        ]);
    }

    public function create_karyawan()
    {
        $model = new User();
        return view('backend/user/form_karyawan',[
            'model'=>$model
        ]);
    }

    public function store_karyawan(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
        ]);

        $model = new User();
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->address = $request->address;
        $model->password = bcrypt($request->password);
        $model->type = 3;
        $model->isActive = $request->status;
        $model->save();

        return redirect()->route('backend.user.karyawan.manage');
    }

    public function show_karyawan($id)
    {
        //
    }

    public function edit_karyawan($id)
    {
        $model = User::findOrFail($id);
        return view('backend/user/form_karyawan',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update_karyawan(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
        ]);

        $model = User::findOrFail($id);
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->address = $request->address;
        $model->password = bcrypt($request->password);
        $model->isActive = $request->status;
        $model->save();

        return redirect()->route('backend.user.karyawan.manage');
    }
}
