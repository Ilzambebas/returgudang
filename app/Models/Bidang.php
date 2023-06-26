<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    
    protected $table = 'tabel_bidang';
    protected $primaryKey = 'id_bidang';
    
    protected $fillable = [
        'id_bidang',
        'nama_bidang',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
}
