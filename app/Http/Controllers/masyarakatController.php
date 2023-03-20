<?php

namespace App\Http\Controllers;

use App\Models\masyarakatmodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class masyarakatController extends Controller
{
    public function indexmasyarakat
    (){
        $contacts = masyarakatmodel::all();
        return view('admin/datamasyarakat',['contacts' =>$contacts]);
    }
    

    public function tambahmasyarakat(Request $request){
       
        $data = new masyarakatmodel();

        $data->nama_lengkap = $request->nama_lengkap;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->telp = $request->telp;

         $data->save();
         return redirect('datamasyarakat')->with('alertSuccess','masyarakat
          Berhasil Di Tambahkan');
    }

    public function ubahmasyarakat
    (masyarakatmodel $user, Request $request) {

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->telp = $request->telp;

        $user->save();
        return redirect('datamasyarakat')->with('alertSuccess','Data masyarakat
         Berhasil Di Ubah');
    }

public function hapusmasyarakat
($id_user)
{

    DB::table('tb_masyarakat')->where('id_user',$id_user)->delete();
		
	return redirect('datamasyarakat')->with('alertSuccess','Data berhasil Di Hapus');
}
}
