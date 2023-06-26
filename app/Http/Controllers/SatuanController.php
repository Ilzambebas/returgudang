<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Satuan;

class SatuanController extends Controller
{
    public function satuan()
    {
        $satuan = Satuan::all();
        return view('admin.master.satuan.satuan', compact('satuan'));
    }

    // public function create(){
    //     return view('admin.master.satuan.create');
    // }
   
    public function store(Request $request)
    {
        Satuan::create([
             'nama_satuan'     => $request->nama_satuan,
             'status'          => $request->status,
             'created_at'      => date('Y-m-d H:i:s'),
             'updated_at'      => date('Y-m-d H:i:s'),
             'deleted_at'      => date('Y-m-d H:i:s'),
        ]);
        return redirect('/satuan')->with('succes', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id_satuan)
    {
        $satuan = Satuan::find($id_satuan);
 
        $satuan->nama_satuan  = $request->nama_satuan;
        $satuan->status       = $request->status;
        $satuan->created_at   = date('Y-m-d H:i:s');
        $satuan->updated_at   = date('Y-m-d H:i:s');
        $satuan->deleted_at   = date('Y-m-d H:i:s');
 
        $satuan->save();

        return redirect('/satuan')->with('succes', 'Data Berhasil Di Perbarui');
    }

   
    public function destroy($id_satuan)
    {
        $satuan = Satuan::find($id_satuan);
 
        $satuan->delete();

        return redirect('/satuan')->with('succes', 'Data Berhasil Di Hapus');
    }
}
