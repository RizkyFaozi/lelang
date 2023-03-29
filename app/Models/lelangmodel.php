<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lelangmodel extends Model
{
    use HasFactory;

    protected $table = 'tb_lelang';
    protected $primaryKey = 'id_lelang';
    protected $guarded = ['id_lelang'];
    protected $fillabel = ['id_barang','tgl_mulai', 'tgl_selesai', 'harga_ahkir', 'id_user','id_petugas','status'];
    public $timestamps = false;

    public function barang()
    {
        return $this->hasOne(barangmodel::class,'id_barang','id_barang');
    }

    public function get_pemenang()
    {
       $menang = $this->historylelang->sortByDesc('penawaran_harga');
       return $menang->frist();
    }
}
