<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Bidang;

class BidangController extends Controller
{
    public function bidang()
    {
        $bidang = Bidang::all();
        return view('admin.master.bidang.bidang', compact('bidang'));
    }

    public function create(){
        return view('admin.master.user.create');
    }
   
    public function store(Request $request)
    {
        Bidang::create([
             'nama_bidang'     => $request->nama_bidang,
             'status'          => $request->status,
             'created_at'      => date('Y-m-d H:i:s'),
             'updated_at'      => date('Y-m-d H:i:s'),
             'deleted_at'      => date('Y-m-d H:i:s'),
        ]);
        return redirect('/bidang')->with('succes', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id_bidang)
    {
        $bidang = Bidang::find($id_bidang);
 
        $bidang->nama_bidang  = $request->nama_bidang;
        $bidang->status       = $request->status;
        $bidang->created_at   = date('Y-m-d H:i:s');
        $bidang->updated_at   = date('Y-m-d H:i:s');
        $bidang->deleted_at   = date('Y-m-d H:i:s');
 
        $bidang->save();

        return redirect('/bidang')->with('succes', 'Data Berhasil Di Perbarui');
    }

   
    public function destroy($id_bidang)
    {
        $bidang = Bidang::find($id_bidang);
 
        $bidang->delete();

        return redirect('/bidang')->with('succes', 'Data Berhasil Di Hapus');
    }
}
