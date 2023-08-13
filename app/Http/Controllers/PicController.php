<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use Illuminate\Http\Request;

class PicController extends Controller
{
    public function pic()
    {
        $pic = Pic::all();
        return view('admin.master.pic.pic', compact('pic'));
    }

    // public function create(){
    //     return view('admin.master.jenis.create');
    // }

    public function store(Request $request)
    {
        Pic::create([
             'nama_pic'     => $request->nama_pic,
             'status'          => $request->status,
             'created_at'      => date('Y-m-d H:i:s'),
             'updated_at'      => date('Y-m-d H:i:s'),
             'deleted_at'      => date('Y-m-d H:i:s'),
        ]);
        return redirect('/pic')->with('status', 'Data Berhasil Disimpan');
    }

    public function update(Request $request)
    {
        $pic = Pic::where('id_pic',$request->get('id'))->first();

        $pic->nama_pic  = $request->nama_pic;
        $pic->status       = $request->status;
        $pic->created_at   = date('Y-m-d H:i:s');
        $pic->updated_at   = date('Y-m-d H:i:s');
        $pic->deleted_at   = date('Y-m-d H:i:s');

        $pic->update();

        return response()->json([
            'message' => 'Berhasil mengganti data.',
        ]);
    }

    function edit(Request $request){

        $data = Pic::where('id_pic','=',$request->get('id'))->first();
        return response()->json([
            'data' => $data
        ]);
    }

    public function destroy(Request $request)
    {
        $pic = Pic::where('id_pic','=',$request->get('id_pic'))->first()->delete();

        return redirect()->route('pic.pic')->with('status', 'Data Berhasil Di Hapus');
    }
}
