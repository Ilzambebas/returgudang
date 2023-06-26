<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    
    protected $table = 'tabel_jenis';
    protected $primaryKey = 'id_jenis';
    
    protected $fillable = [
        'id_jenis',
        'nama_jenis',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
}
