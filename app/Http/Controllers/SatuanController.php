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
        return redirect('/satuan')->with('status', 'Data Berhasil Disimpan');
    }

    function edit(Request $request){

        $data = Satuan::where('id_satuan','=',$request->get('id'))->first();
        return response()->json([
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $satuan = Satuan::where('id_satuan',$request->get('id'))->first();
        $satuan->nama_satuan  = $request->nama_satuan;
        $satuan->status       = $request->status;
        $satuan->created_at   = date('Y-m-d H:i:s');
        $satuan->updated_at   = date('Y-m-d H:i:s');
        $satuan->deleted_at   = date('Y-m-d H:i:s');

        $satuan->update();

        return response()->json([
            'message' => 'Berhasil mengganti data.',
        ]);

    }


    public function destroy(Request $request)
    {
        Satuan::where('id_satuan','=',$request->get('id_satuan'))->first()->delete();

        return redirect()->route('satuan.satuan')->with('status', 'Data Berhasil Di Hapus');
    }
}
