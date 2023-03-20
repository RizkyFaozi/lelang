<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function postlogin(Request $request)
    { 
        if(Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password]))  { 
            return redirect('/')->with('alertSuccess','Hallo, Selamat Datang Di Lelang Online'); 
        }
        elseif(Auth::guard('petugas')->attempt(['username' => $request->username, 'password' => $request->password]))  { 
            return redirect('/admin')->with('alertSuccess','Anda Berhasil Login'); 
        }
       else{ 
        return redirect('login')->with('alertError','Password Atau Username Anda Salah Mohon Di Cek kembali');
        }
    }
       

    public function logout(){
       if (Auth::guard('masyarakat')->check()){
        Auth::guard('masyarakat')->logout();
       }elseif (Auth::guard('user')->check()){
        Auth::guard('user')->logout();
       }
        return redirect('/login')->with('alertSuccess','Anda Berhasil Logout');
    }
    
   
}



            //   if(Auth::attempt($request->only('email','password')))  { 
        //     return redirect('/admin')->with('alert','Anda Berhasil login'); 
        // }