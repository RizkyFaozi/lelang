<?php

namespace App\Http\Controllers;

use App\Models\historymodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class hargaController extends Controller
{
    public function indexharga(){
        $contactsharga = historymodel::with('barang','lelang','masyarakat')->orderBy('penawaran_harga', 'DESC')->get();
        return view('user/barang',['contactsharga' =>$contactsharga]);
    }


    public function tambahharga(Request $request){
        $validation = Validator::make($request->all(), [
            'penawaran_harga' => 'required',
        ]);

        if($validation->fails()){
            return redirect('/')->withErrors($validation->errors()->first())->withInput();
        }
        $data = new historymodel();
        $data->id_lelang = $request->id_lelang;
        $data->id_barang = $request->id_barang;
        $data->id_user = $request->id_user;
        $data->penawaran_harga = $request->penawaran_harga;

         $data->save();
         return redirect('/')->with('alertSuccess','Anda Berhasil Melakukan Penawaran');
    }

    public function ubahharga(historymodel $user, Request $request) {

        $user->harga = $request->harga;

        $user->save();
        return redirect('/')->with('alertSuccess','Anda berhasil Mengubah Penawaran anda');
    }

public function hapusharga($id_history)
{

    DB::table('history_lelang')->where('id_history',$id_history)->delete();

	return redirect('/')->with('alertSuccess','Anda Berhasil Menghapus Penawaran');
}
}
