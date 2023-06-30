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
        return redirect('/jenis')->with('status', 'Data Berhasil Disimpan');
    }

    public function update(Request $request)
    {
        $jenis = Jenis::where('id_jenis',$request->get('id'))->first();

        $jenis->nama_jenis  = $request->nama_jenis;
        $jenis->status       = $request->status;
        $jenis->created_at   = date('Y-m-d H:i:s');
        $jenis->updated_at   = date('Y-m-d H:i:s');
        $jenis->deleted_at   = date('Y-m-d H:i:s');

        $jenis->update();

        return response()->json([
            'message' => 'Berhasil mengganti data.',
        ]);
    }

    function edit(Request $request){

        $data = Jenis::where('id_jenis','=',$request->get('id'))->first();
        return response()->json([
            'data' => $data
        ]);
    }

    public function destroy(Request $request)
    {
        $jenis = Jenis::where('id_jenis','=',$request->get('id_jenis'))->first()->delete();

        return redirect()->route('jenis.jenis')->with('status', 'Data Berhasil Di Hapus');
    }
}
