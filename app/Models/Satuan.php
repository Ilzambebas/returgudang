<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    
    protected $table = 'tabel_satuan';
    protected $primaryKey = 'id_satuan';
    
    protected $fillable = [
        'id_satuan',
        'nama_satuan',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
}
