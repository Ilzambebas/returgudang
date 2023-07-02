<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Satuan;
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
                "tabel_barang.id_jenis"
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
                'tabel_barang.id_jenis', '!=', null
            )
            ->where(
                'tabel_barang.id_satuan', '!=', null
            )

            ->orderBy(
                "id_barang","DESC"
            )
            ->get();
            $satuan = Satuan::select('id_satuan','nama_satuan')->where('nama_satuan','!=',null)->get();
            $jenis = Jenis::select('id_jenis','nama_jenis')->where('nama_jenis','!=',null)->get();
            return view("admin.master.barang.barang", compact('barang','satuan','jenis'));
    }

    // public function create(){
    //     return view('admin.master.barang.create');
    // }

    public function store(Request $request)
    {
        Barang::create([
             'nama_barang'     => $request->get('nama_barang'),
             'id_jenis'     => $request->get('jenis_id'),
             'id_satuan'     => $request->get('satuan_id'),
             'created_at'      => date('Y-m-d H:i:s'),
             'updated_at'      => date('Y-m-d H:i:s'),
             'deleted_at'      => date('Y-m-d H:i:s'),
        ]);
        return redirect('/barang')->with('status', 'Data Berhasil Disimpan');
    }
    function edit(Request $request) {
        $data = Barang::where('id_barang','=',$request->get('id'))->first();
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $barang = Barang::where('id_barang','=',$request->get('id'))->first();
        $barang->nama_barang  = $request->nama_barang;
        $barang->id_jenis   = $request->jenis_id;
        $barang->id_satuan  = $request->satuan_id;
        $barang->created_at   = date('Y-m-d H:i:s');
        $barang->updated_at   = date('Y-m-d H:i:s');
        $barang->deleted_at   = date('Y-m-d H:i:s');

        $barang->update();

        return response()->json([
            'message' => 'Berhasil mengganti data.',
        ]);
    }

    public function destroy(Request $request)
    {
        Barang::where('id_barang','=',$request->get('id_barang'))->first()->delete();

        return redirect()->route('barang.barang')->with('status', 'Data Berhasil Di Hapus');
    }
}
