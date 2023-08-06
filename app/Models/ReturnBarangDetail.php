<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnBarangDetail extends Model
{
    use HasFactory;

    protected $table = 'tabel_detail_return';
    protected $primaryKey = 'id_detail_return';

    protected $fillable = ['status_penerimaan'];
}
