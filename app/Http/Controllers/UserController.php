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
            $user->password = Hash::make($request->get('password'));
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

    function edit(Request $request) {
        $user = User::where('id_user',$request->get('id'))->first();
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $user = User::where('id_user',$request->get('id_user'))->first();
        $user->nama_user = $request->get('nama_user');
        if ($request->get('password') != null || $request->has('password')) {
            $user->password = Hash::make($request->get('password'));
        }
        $user->username = $request->get('username');
        $user->level = $request->get('level');
        $user->no_hp = $request->get('no_hp');
        $user->update();
        return redirect('/user')->with('status', 'Data Berhasil Diganti');
    }


    public function destroy(Request $request)
    {
        User::where('id_user',$request->get('id_user'))->first()->delete();
        return redirect('/user')->with('status', 'Data Berhasil Di Hapus');
    }
}
