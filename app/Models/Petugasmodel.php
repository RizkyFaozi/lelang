<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugasmodel extends Model
{
    use HasFactory;

    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_petugas';
    protected $guarded = ['id_petugas'];
    protected $fillabel = ['nama_petugas','username', 'password', 'level', 'id_level'];
    public $timestamps = false;
}