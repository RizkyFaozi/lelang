<?php

namespace App\Http\Controllers;

use App\Models\Petugasmodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function indexpetugas(){
        $contacts = Petugasmodel::all();
        return view('admin/datapetugas',['contacts' =>$contacts]);
    }
    

    public function tambahpetugas(Request $request){
        $validation = Validator::make($request->all(), [
            'nama_petugas' => 'required',
        ]);

        if($validation->fails()){
            return redirect('/')->withErrors($validation->errors()->first())->withInput();
        }
        $data = new Petugasmodel();
        $data->nama_petugas = $request->nama_petugas;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->level = $request->level;
        $data->id_level = $request->id_level;

         $data->save();
         return redirect('datapetugas')->with('alertSuccess','Petugas Berhasil Di Tambahkan');
    }

    public function ubahpetugas(Petugasmodel $user, Request $request) {

        $user->nama_petugas = $request->nama_petugas;
        $user->username = $request->username;
        $user->level = $request->level;
        $user->id_level = $request->id_level;

        $user->save();
        return redirect('datapetugas')->with('alertSuccess','Data petugas Berhasil Di Ubah');
    }

public function hapuspetugas($id_petugas)
{

    DB::table('tb_petugas')->where('id_petugas',$id_petugas)->delete();
		
	return redirect('datapetugas')->with('alertSuccess','Data berhasil Di Hapus');
}
}
