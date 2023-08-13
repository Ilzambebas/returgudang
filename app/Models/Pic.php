<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    use HasFactory;
    
    protected $table = 'tabel_pic';
    protected $primaryKey = 'id_pic';
    
    protected $fillable = [
        'id_pic',
        'nama_pic',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
}
