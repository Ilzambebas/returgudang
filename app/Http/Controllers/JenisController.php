<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function jenis()
    {
        $jenis = Jenis::all();
        return view('admin.master.jenis.jenis', compact('jenis'));
    }

    // public function create(){
    //     return view('admin.master.jenis.create');
    // }
   
    public function store(Request $request)
    {
        Jenis::create([
             'nama_jenis'     => $request->nama_jenis,
             'status'          => $request->status,
             'created_at'      => date('Y-m-d H:i:s'),
             'updated_at'      => date('Y-m-d H:i:s'),
             'deleted_at'      => date('Y-m-d H:i:s'),
        ]);
        return redirect('/jenis')->with('succes', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id_jenis)
    {
        $jenis = Jenis::find($id_jenis);
 
        $jenis->nama_jenis  = $request->nama_jenis;
        $jenis->status       = $request->status;
        $jenis->created_at   = date('Y-m-d H:i:s');
        $jenis->updated_at   = date('Y-m-d H:i:s');
        $jenis->deleted_at   = date('Y-m-d H:i:s');
 
        $jenis->save();

        return redirect('/jenis')->with('succes', 'Data Berhasil Di Perbarui');
    }

   
    public function destroy($id_jenis)
    {
        $jenis = Jenis::find($id_jenis);
 
        $jenis->delete();

        return redirect('/jenis')->with('succes', 'Data Berhasil Di Hapus');
    }
}
