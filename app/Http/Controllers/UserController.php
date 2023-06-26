<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
   
    public function index()
    {
        $user = User::all();
        return view('admin.master.user.index', compact('user'));
    }

    public function create(){
        return view('admin.master.user.create');
    }
   
    public function store(Request $request)
    {
        User::create([
             'nama_user'  => $request->nama_user,
             'username'   => $request->username,
             'password'   => Hash::make($request->password),
             'level'      => $request->level,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s'),
             'deleted_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/user')->with('succes', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id_user)
    {
        $user = User::find($id_user);
 
        $user->nama_user       = $request->nama_user;
        $user->username       = $request->username;
        $user->password   = Hash::make($request->password);
        $user->level      = $request->level;
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');
        $user->deleted_at = date('Y-m-d H:i:s');
 
        $user->save();

        return redirect('/user')->with('succes', 'Data Berhasil Di Perbarui');
    }

   
    public function destroy($id_user)
    {
        $user = User::find($id_user);
 
        $user->delete();

        return redirect('/user')->with('succes', 'Data Berhasil Di Hapus');
    }
}
