<?php

namespace App\Http\Controllers;

use App\Models\ReturnBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // return $request->get('start');
        Session::forget('dari');
        Session::forget('sampai');
        $query = ReturnBarang::select('tabel_return.*',
                        'tabel_detail_return.*',
                        'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                        'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                        ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                        ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                        ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                        ->where('status_penerimaan','Y');

        if ($request->has('start') || $request->has('end')) {
            $start = $request->get('start');
            $end = $request->get('end');
            Session::put('dari',$start);
            Session::put('sampai',$end);
            $data = $query->whereBetween('tabel_return.tgl_pengembalian',[$start,$end])->get();
        } else {
            // Session::put('dari',Carbon::now());
            // Session::put('sampai',$request->get('sampai'));
            $data = $query->get();
        }
        // return $data;
        return view('admin.pages.return.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function detailPdf($id) {
        $data = ReturnBarang::select('tabel_return.*',
                            'tabel_detail_return.*',
                            'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                            'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                                ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                                ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                                ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                                ->where('tabel_detail_return.id_detail_return',$id)
                                ->get();
        return view('admin.pages.return.detail-pdf',compact('data'));
    }
    function pdf() {
        $query = ReturnBarang::select('tabel_return.*',
                        'tabel_detail_return.*',
                        'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                        'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                        ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                        ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                        ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                        ->where('status_penerimaan','Y');

        if (Session::has('start') || Session::has('end')) {
            $start = Session::get('dari');
            $end = Session::get('sampai');
            $data = $query->whereBetween('tabel_return.tgl_pengembalian',[$start,$end])->get();
        } else {
            // Session::put('dari',Carbon::now());
            // Session::put('sampai',$request->get('sampai'));
            $data = $query->get();

        }

        return view('admin.pages.return.pdf',compact('data'));
    }
}
