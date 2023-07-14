<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tabel_user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'id_user',
        'nama_user',
        'username',
        'password',
        'no_hp',
        'level',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password',

    ];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';


}
