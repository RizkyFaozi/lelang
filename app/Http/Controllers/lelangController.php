<?php

namespace App\Http\Controllers;

use App\Models\lelangmodel;
use App\Models\historymodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class lelangController extends Controller
{
    public function indexlelang(){
        $contacts = lelangmodel::with('barang')->get();
        return view('admin/statuss/Statusbarang')->with(compact('contacts'));
    }

    public function laporan(){
        $contacts = lelangmodel::with('barang')->get();
        return view('admin/statuss/laporan')->with(compact('contacts'));
    }

    public function display(){
        $contacts = lelangmodel::with('barang')->where('status','dibuka')->get();
        return view('user/index',['contacts' =>$contacts]);
    }

    public function tambahlelang(Request $request){
        $validation = Validator::make($request->all(), [
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'status' => 'required',
        ]);

        if($validation->fails()){
            return redirect('Upload')->withErrors($validation->errors()->first())->withInput();
        }
        $data = new lelangmodel();
        $data->id_barang = $request->id_barang;
        $data->tgl_mulai = $request->tgl_mulai;
        $data->tgl_selesai = $request->tgl_selesai;
        $data->id_petugas= $request->id_petugas;
        $data->status = $request->status;

         $data->save();
         return redirect('Upload')->with('alertSuccess','Data Berhasil Di Upload');
    }

    public function ubahlelang(lelangmodel $user, Request $request) {

        $user->id_barang = $request->id_barang;
        $user->tgl_mulai = $request->tgl_mulai;
        $user->tgl_selesai = $request->tgl_selesai;
        $user->id_petugas = $request->id_petugas;
        $user->status = $request->status;

        $user->save();
        return redirect('Update')->with('alertSuccess','Barang Lelang Berhasil Di Perbarui');
    }

    public function Uploadpemenang(lelangmodel $user, Request $request) {

        $user->harga_ahkir = $request->harga_ahkir;
        $user->id_user = $request->id_user;
        $user->Status = 'selesai';

        $user->save();
        return redirect('Statusbarang')->with('alertSuccess','Pemenang Sudah Di Tentukan');
    }



    public function lelangStatus(lelangmodel $user, Request $request) {

        $user->tgl_mulai = $request->tgl_mulai;
        $user->tgl_selesai = $request->tgl_selesai;
        $user->status = $request->status;

        $user->save();
        return redirect('Statusbarang')->with('alertSuccess','Status Lelang Berhasil Di Perbarui');
    }

public function hapuslelang($id_lelang)
{
    DB::table('tb_lelang')->where('id_lelang',$id_lelang)->delete();
   

	return redirect('Statusbarang')->with('alertSuccess','Data Lelang berhasil Di Hapus');
}


}
