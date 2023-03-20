<?php

namespace App\Http\Controllers;

use App\Models\barangmodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class barangController extends Controller 
{
    public function indexbarang(){
        $contacts = barangmodel::all();
        return view('admin/databarang',['contacts' =>$contacts]);
    }

    public function belumselesai(){
        $contacts = barangmodel::all();
        return view('admin/statuss/Upload',['contacts' =>$contacts]);
    }

    public function berlangsung(){
        $contacts = barangmodel::all()->where('status','=','berlangsung');
        return view('admin/statuss/Statusbarang',['contacts' =>$contacts]);
    }  
    
    public function userberlangsung(){
        $contacts = barangmodel::all()->where('status','=','berlangsung');
        return view('user/index',['contacts' =>$contacts]);
    }  

    public function selesai(){
        $contacts = barangmodel::all()->where('status','=','selesai');
        return view('user/index',['contacts' =>$contacts]);
    }

    public function barang(){
        $contacts = barangmodel::all()->where('status','=','selesai');
        return view('user/index',['contacts' =>$contacts]);
    }


    public function tambahbarang(Request $request){
        $validation = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $check = barangmodel::where('nama_barang',$request->nama_barang)->count() > 0;
        if($check){
            return redirect('databarang')->with('alertError','Nama Barang ada');
        }

        $tempatgambar = $request->image->getClientOriginalName();
        $request->image->storeAs('image/barang',$tempatgambar);

        $data = new barangmodel();
        $data->nama_barang = $request->nama_barang;
        $data->tgl = $request->tgl;
        $data->harga_awal = $request->harga_awal;
        $data->deskripsi = $request->deskripsi;
        $data->image = $tempatgambar;

         $data->save();
         return redirect('databarang')->with('alertSuccess','Barang Berhasil Di Tambahkan');
    }

    public function ubahbarang(Request $request,$id_barang) {
        $gambar= barangmodel::find($id_barang);
        $user = barangmodel::find($id_barang);

        if(!empty($request->image)){
            @unlink(public_path("image/barang{$gambar->image}"));
        }else{
            $gambar = $user->image;
        }

        $user->image = $gambar;
        $user->nama_barang = $request->nama_barang;
        $user->harga_awal = $request->harga_awal;
        $user->deskripsi = $request->deskripsi;

        $user->save();
        return redirect('databarang')->with('alertSuccess','Data Barang Berhasil Di Ubah');
    }

public function hapusbarang($id_barang)
{

    DB::table('tb_barang')->where('id_barang',$id_barang)->delete();
		
	return redirect('databarang')->with('alertSuccess','Data berhasil Di Hapus');
}
}
