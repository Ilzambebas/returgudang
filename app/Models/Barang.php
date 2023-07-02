<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tabel_barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_barang',
        'id_jenis',
        'id_satuan',
        'nama_barang',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
}
