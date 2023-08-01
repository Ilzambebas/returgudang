<?php

namespace App\Http\Controllers;

use App\Models\ReturnBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotTelegramController extends Controller
{
    public function setWebhook(){
        $activity = Telegram::getUpdates();
        dd($activity);
    }
    public function commandHandlerWebhook(){

        $detailReturn = ReturnBarang::select('tabel_return.*',
        'tabel_detail_return.*',
        'tabel_bidang.id_bidang as id','tabel_bidang.nama_bidang',
        'tabel_jenis.id_jenis','tabel_jenis.nama_jenis')
        ->join('tabel_detail_return','tabel_detail_return.id_return','tabel_return.id_return')
        ->join('tabel_jenis','tabel_jenis.id_jenis','tabel_detail_return.jenis')
        ->join('tabel_bidang','tabel_bidang.id_bidang','tabel_detail_return.id_bidang')
        ->where('status_return','rusak')
        ->orderBy('tabel_detail_return.id','DESC')
        ->first();
        $tgl_pengembalian = Carbon::parse($detailReturn->tgl_pengembalian)->translatedFormat('d-F-Y');
        $sttus = $detailReturn->status_penerimaan == 'T' ? 'Ditolak' : 'Diterima';
        $link = route('return-layak-repair.index');
        $user = 'rifjan';
        $text = "Data baru ditambahkan\n"
            . "<b>Tanggal Pengembalian :  $tgl_pengembalian </b>\n"
            . "<b>Deskripsi : $detailReturn->keterangan</b>\n"
            . "<b>Status : $detailReturn->status_return </b>\n"
            . "<b>Status Penerimaan :  $sttus</b>\n"
            . "<b>User : $user </b>\n"
            . "<b>Link : $link </b>\n";

        Telegram::sendMessage([
            'chat_id' => -1001818053583,
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
    }
}
