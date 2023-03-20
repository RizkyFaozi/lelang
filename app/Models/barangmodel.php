<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangmodel extends Model
{
    use HasFactory;

    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    protected $guarded = ['id_barang'];
    protected $fillabel = ['nama_barang','tgl', 'harga_awal', 'deskripsi', 'image','status'];
    public $timestamps = false;
}
