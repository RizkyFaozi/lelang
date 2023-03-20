<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masyarakatmodel extends Model
{
    use HasFactory;

    protected $table = 'tb_masyarakat';
    protected $primaryKey = 'id_user';
    protected $guarded = ['id_user'];
    protected $fillabel = ['nama_lengkap','username', 'password','telp'];
    public $timestamps = false;
}