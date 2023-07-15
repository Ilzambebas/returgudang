<?php

namespace App\Http\Controllers;

use App\Models\ReturnBarang;
use Illuminate\Http\Request;

class DataReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ReturnBarang::select('tabel_return.*',
                        'tabel_detail_return.*',
                        'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                        'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                        ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                        ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                        ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                        ->where('status_penerimaan','Y')
                        ->get();
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
}
