<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
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
        try {
            $user = new User;
            $user->nama_user = $request->get('nama_user');
            $user->username = $request->get('username');
            $user->password = $request->get('password');
            $user->no_hp = $request->get('no_hp');
            $user->level = $request->get('level');
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();
            return redirect('/user')->with('status', 'Data Berhasil Disimpan');
        } catch (Exception $e) {
            return $e;
        } catch (QueryException $e){
            return $e;
        }

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
