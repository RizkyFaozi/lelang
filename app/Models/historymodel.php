<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historymodel extends Model
{
    use HasFactory;

    protected $table = 'history_lelang';
    protected $primaryKey = 'id_history';
    protected $guarded = ['id_history'];
    protected $fillabel = ['id_lelang','id_barang', 'id_user', 'penawaran_harga'];
    public $timestamps = false;

    public function barang()
    {
        return $this->hasOne(barangmodel::class,'id_barang','id_barang');
    }

    public function lelang()
    {
        return $this->hasOne(lelangmodel::class,'id_lelang','id_lelang');
    }

    public function masyarakat()
    {
        return $this->hasOne(masyarakatmodel::class,'id_user','id_user');
    }
}
