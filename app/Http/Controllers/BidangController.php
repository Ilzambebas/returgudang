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
        return redirect('/bidang')->with('status', 'Data Berhasil Disimpan');
    }

    function edit(Request $request){

        $data = Bidang::where('id_bidang','=',$request->get('id'))->first();
        return response()->json([
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $bidang = Bidang::where('id_bidang',$request->get('id'))->first();

        $bidang->nama_bidang  = $request->nama_bidang;
        $bidang->status       = $request->status;
        $bidang->created_at   = date('Y-m-d H:i:s');
        $bidang->updated_at   = date('Y-m-d H:i:s');
        $bidang->deleted_at   = date('Y-m-d H:i:s');

        $bidang->save();

        return response()->json([
            'message' => 'Berhasil mengganti data.',
        ]);
    }


    public function destroy(Request $request)
    {
        $jenis = Bidang::where('id_bidang','=',$request->get('id_bidang'))->first()->delete();

        return redirect()->route('bidang.bidang')->with('status', 'Data Berhasil Di Hapus');
    }
}
