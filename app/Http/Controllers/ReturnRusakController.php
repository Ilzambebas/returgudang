<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Bidang;
use App\Models\Jenis;
use App\Models\ReturnBarang;
use App\Models\ReturnBarangDetail;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnRusakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ReturnBarang::select('tabel_return.*',
                            'tabel_detail_return.id_detail_return',
                            'tabel_detail_return.keterangan',
                            'tabel_detail_return.no_po',
                            'tabel_detail_return.nama_pic',
                            'tabel_detail_return.jumlah','tabel_detail_return.no_pekerjaan',
                            'tabel_detail_return.id_bidang','tabel_detail_return.jenis',
                            'tabel_detail_return.status_return','tabel_detail_return.status_penerimaan',
                            'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                            'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                            ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                            ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                            ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                            ->get();
        // return $data;
        return view('admin.pages.return.return-rusak.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Bidang::where('status','Ya')->get();
        $jenis = Jenis::where('status','Ya')->get();
        return view('admin.pages.return.return-rusak.create',compact('barang','jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_po' => 'required|unique:tabel_detail_return,no_po',
            'pic' => 'required',
            'no_pekerjaan' => 'required',
            'bidang_id' => 'required',
            'deskripsi' => 'required',
            'jenis_id' => 'required',
            'jumlah' => 'required',
        ]);
        try {
            if (Auth::check()) {
                $id_user = Auth::user()->id;
            }else{
                $user = User::where('level','user')->first()->id_user;
                $id_user = $user;
            }
            $tgl = Carbon::now();
            $return = new ReturnBarang;
            $return->id_user = $id_user;
            $return->tgl_pengembalian = $tgl;
            $return->save();

            $detailReturn = new ReturnBarangDetail;
            $detailReturn->id_return = $return->id_return;
            $detailReturn->no_po = $request->get('no_po');
            $detailReturn->nama_pic = $request->get('pic');
            $detailReturn->jumlah = $request->get('jumlah');
            $detailReturn->no_pekerjaan = $request->get('no_pekerjaan');
            $detailReturn->id_bidang  = $request->get('bidang_id');
            $detailReturn->jenis = $request->get('jenis_id');
            $detailReturn->keterangan = $request->get('deskripsi');
            $detailReturn->status_return = 'rusak';
            $detailReturn->save();
            return redirect()->route('return-rusak.index')->withStatus('Berhasil menambahkan data.');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi kesalahan');
        } catch (QueryException $e){
            return redirect()->back()->withError('Terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ReturnBarang::select('tabel_return.*',
                            'tabel_detail_return.id_detail_return',
                            'tabel_detail_return.keterangan',
                            'tabel_detail_return.no_po',
                            'tabel_detail_return.nama_pic',
                            'tabel_detail_return.jumlah','tabel_detail_return.no_pekerjaan',
                            'tabel_detail_return.id_bidang','tabel_detail_return.jenis',
                            'tabel_detail_return.status_return','tabel_detail_return.status_penerimaan',
                            'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                            'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                                ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                                ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                                ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                                ->where('tabel_detail_return.id_detail_return',$id)
                                ->first();
        $barang = Bidang::where('status','Ya')->get();
        $jenis = Jenis::where('status','Ya')->get();
        return view('admin.pages.return.return-rusak.show',compact('data','barang','jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ReturnBarang::select('tabel_return.*',
                            'tabel_detail_return.id_detail_return',
                            'tabel_detail_return.keterangan',
                            'tabel_detail_return.no_po',
                            'tabel_detail_return.nama_pic',
                            'tabel_detail_return.jumlah','tabel_detail_return.no_pekerjaan',
                            'tabel_detail_return.id_bidang','tabel_detail_return.jenis',
                            'tabel_detail_return.status_return','tabel_detail_return.status_penerimaan',
                            'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                            'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                                ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                                ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                                ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                                ->where('tabel_detail_return.id_detail_return',$id)
                                ->first();
        $barang = Bidang::where('status','Ya')->get();
        $jenis = Jenis::where('status','Ya')->get();
        return view('admin.pages.return.return-rusak.edit',compact('data','barang','jenis'));
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
        $request->validate([
            'no_po' => 'required',
            'pic' => 'required',
            'no_pekerjaan' => 'required',
            'bidang_id' => 'required',
            'deskripsi' => 'required',
            'jenis_id' => 'required',
            'jumlah' => 'required',
        ]);
        try {
            if (Auth::check()) {
                $id_user = Auth::user()->id;
            }else{
                $user = User::where('level','user')->first()->id_user;
                $id_user = $user;
            }
            $detailReturn = ReturnBarangDetail::where('id_detail_return',$id)->first();
            $idReturn = $detailReturn->id_return;

            $tgl = Carbon::now();
            $return = ReturnBarang::where('id_return',$idReturn)->first();
            $return->id_user = $id_user;
            $return->tgl_pengembalian = $tgl;
            $return->update();

            $detailReturn->id_return = $return->id_return;
            $detailReturn->no_po = $request->get('no_po');
            $detailReturn->nama_pic = $request->get('pic');
            $detailReturn->jumlah = $request->get('jumlah');
            $detailReturn->no_pekerjaan = $request->get('no_pekerjaan');
            $detailReturn->id_bidang  = $request->get('bidang_id');
            $detailReturn->jenis = $request->get('jenis_id');
            $detailReturn->keterangan = $request->get('deskripsi');
            $detailReturn->status_return = 'rusak';
            $detailReturn->update();
            return redirect()->route('return-rusak.index')->withStatus('Berhasil mengganti data.');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi kesalahan');
        } catch (QueryException $e){
            return redirect()->back()->withError('Terjadi kesalahan');
        }
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

    public function destroyData(Request $request)
    {
        ReturnBarang::where('id_return',$request->get('id_user'))->first()->delete();
        ReturnBarangDetail::where('id_return',$request->get('id_user'))->first();
        return redirect()->route('return-rusak.index')->withStatus('Berhasil menghapus data.');

        // $jenis = Bidang::where('id_bidang','=',$request->get('id_bidang'))->first()->delete();

        // return redirect()->route('bidang.bidang')->with('status', 'Data Berhasil Di Hapus');
    }
}
