<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Jenis;
use App\Models\ReturnBarang;
use App\Models\ReturnBarangDetail;
use App\Models\Satuan;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Telegram\Bot\Laravel\Facades\Telegram;

class ReturnLayakPakaiController extends Controller
{
    public function index()
    {
        $data = ReturnBarang::select('tabel_return.*',
                            'tabel_detail_return.*',
                            'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                            'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                            ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                            ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                            ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                            ->where('status_return','layak pakai')
                            ->get();
        // return $data;
        return view('admin.pages.return.return-pakai.index',compact('data'));
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
        return view('admin.pages.return.return-pakai.create',compact('barang','jenis'));
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
            $detailReturn->status_return = 'layak pakai';
            $detailReturn->save();

            $tgl_pengembalian = Carbon::parse($detailReturn->tgl_pengembalian)->translatedFormat('d-F-Y');
            $user = Auth::user()->nama_user;

            $sttus = $detailReturn->status_penerimaan == 'T' ? 'Ditolak' : 'Diterima';
            $text = "Data baru ditambahkan\n"
            . "<b>Tanggal Pengembalian :  $tgl_pengembalian </b>\n"
            . "<b>Deskripsi : $detailReturn->keterangan</b>\n"
            . "<b>Status : $detailReturn->status_return </b>\n"
            . "<b>Status Penerimaan :  $sttus</b>\n"
            . "<b>User : $user </b>\n";

            Telegram::sendMessage([
                'chat_id' => -1001818053583,
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
            return redirect()->route('return-layak-pakai.store')->withStatus('Berhasil menambahkan data.');
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
                'tabel_detail_return.*',
                'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
                'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
                    ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
                    ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
                    ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
                    ->where('tabel_detail_return.id_detail_return',$id)
                    ->first();
        $barang = Bidang::where('status','Ya')->get();
        $jenis = Jenis::where('status','Ya')->get();
        return view('admin.pages.return.return-pakai.show',compact('data','barang','jenis'));
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
        return view('admin.pages.return.return-pakai.edit',compact('data','barang','jenis'));
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
            $detailReturn->status_return = 'layak pakai';
            $detailReturn->update();
            return redirect()->route('return-layak-pakai.index')->withStatus('Berhasil mengganti data.');
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

    function prosesPengecekan($id) {
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
        return view('admin.pages.return.return-pakai.proses-pengecekan',compact('data','barang','jenis'));
    }

    public function destroyData(Request $request)
    {
        ReturnBarang::where('id_return',$request->get('id_user'))->first()->delete();
        ReturnBarangDetail::where('id_return',$request->get('id_user'))->first();
        return redirect()->route('return-layak-pakai.index')->withStatus('Berhasil menghapus data.');

        // $jenis = Bidang::where('id_bidang','=',$request->get('id_bidang'))->first()->delete();

        // return redirect()->route('bidang.bidang')->with('status', 'Data Berhasil Di Hapus');
    }

    function prosesPengecekanPost(Request $request) {
        $detailReturn = ReturnBarangDetail::where('id_detail_return',$request->get('id'))->first();
        $detailReturn->status_penerimaan = $request->get('status') == 'ya' ? 'Y' : 'T';
        $detailReturn->update();
        return redirect()->route('return-layak-pakai.index')->withStatus('Berhasil mengganti status data.');

    }

    function TindakLanjut($id){
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
        $satuan = Satuan::where('status','Ya')->get();
        return view('admin.pages.return.return-pakai.tindak-lanjut',compact('data','satuan'));

    }

    function TindakLanjutPost(Request $request) {
        $request->validate([
            'keperluan' => 'required',
            'no_bon' => 'required',
            'tgl_bon' => 'required',
            'status_material' => 'required',
            'satuan' => 'required',
            'lokasi_penyimpanan' => 'required',
            'berat' => 'required'
        ]);
        try {
            $tgl = Carbon::createFromFormat('d/m/Y', $request->get('tgl_bon'))->format('Y-m-d');
            $updateDetail = ReturnBarangDetail::where('tabel_detail_return.id_detail_return',$request->get('id'))->first();
            if ($request->hasFile('file')) {
                $photos = $request->file('file');
                $filename = date('His') . '.' . $photos->getClientOriginalExtension();
                $path = public_path('return_layak');
                if ($photos->move($path, $filename)) {
                    $updateDetail->lokasi = $filename;
                } else {
                    return redirect()->back()->withError('Terjadi kesalahan.');
                }
            }
            $updateDetail->no_bon = $request->get('tgl_bon');
            $updateDetail->tgl_bon = $tgl;
            $updateDetail->lokasi_penyimpanan = $request->get('lokasi_penyimpanan');
            $updateDetail->berat = $request->get('berat');
            $updateDetail->keperluan = $request->get('keperluan');
            $updateDetail->satuan = $request->get('satuan');
            $updateDetail->update();
            return redirect()->route('return-layak-pakai.index')->withStatus('Berhasil menambahkan data.');
        } catch (Exception $th) {
            return redirect()->route('return-layak-pakai.index')->withStatus('Terjadi Kesahalan');
        } catch (QueryException $e){
            return redirect()->route('return-layak-pakai.index')->withStatus('Terjadi Kesalahan');
        }
    }
}
