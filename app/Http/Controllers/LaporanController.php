<?php

namespace App\Http\Controllers;

use App\Models\ReturnBarang;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    function index() {
        $data = ReturnBarang::select('tabel_return.*',
        'tabel_detail_return.*',
        'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
        'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
        ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
        ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
        ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
        ->where('status_penerimaan','Y')->get();
        return view('admin.laporan.index',compact('data'));
    }

    function pdf($id) {
        $data = ReturnBarang::select('tabel_return.*',
                'tabel_detail_return.*',
                'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                    ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                    ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                    ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                    ->where('tabel_detail_return.id_detail_return',$id)
                    ->get();
        return view('admin.laporan.pdf',compact('data'));
    }
}
