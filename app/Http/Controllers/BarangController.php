<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class BarangController extends Controller
{
    public function barang()
    {
       $barang = DB::table("tabel_barang")

            ->leftJoin(
                "tabel_jenis",
                "tabel_jenis.id_jenis",
                "=",
                "tabel_barang.id_barang"
            )

            ->leftJoin(
                "tabel_satuan",
                "tabel_satuan.id_satuan",
                "=",
                "tabel_barang.id_satuan"
            )
            ->select(
                "tabel_barang.*",
                "tabel_jenis.nama_jenis",
                "tabel_satuan.nama_satuan"
            )
            ->where(
                "tabel_barang.deleted_at","=", null
            )
            ->orderBy(
                "id_barang","DESC"
            )
            ->paginate(6);
            return view(
                "admin.master.barang.barang", compact('barang'));
    }

    // public function create(){
    //     return view('admin.master.barang.create');
    // }
   
    public function store(Request $request)
    {
        Barang::create([
             'nama_barang'     => $request->nama_barang,
             'nama_jenis'     => $request->nama_jenis,
             'nama_satuan'     => $request->nama_satuan,
             'created_at'      => date('Y-m-d H:i:s'),
             'updated_at'      => date('Y-m-d H:i:s'),
             'deleted_at'      => date('Y-m-d H:i:s'),
        ]);
        return redirect('/barang')->with('succes', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id_barang)
    {
        $barang = Barang::find($id_barang);
 
        $barang->nama_barang  = $request->nama_barang;
        $barang->nama_jenis   = $request->nama_jenis;
        $barang->nama_satuan  = $request->nama_satuan;
        $barang->created_at   = date('Y-m-d H:i:s');
        $barang->updated_at   = date('Y-m-d H:i:s');
        $barang->deleted_at   = date('Y-m-d H:i:s');
 
        $barang->save();

        return redirect('/barang')->with('succes', 'Data Berhasil Di Perbarui');
    }

   
    // public function destroy($id_barang)
    // {
    //     $barang = Barang::find($id_barang);
 
    //     $barang->delete();

    //     return redirect('/barang')->with('succes', 'Data Berhasil Di Hapus');
    // }
}
