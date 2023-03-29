<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin/dashboard');
    }

    public function datauser(){
        return view('admin/datauser');
    }

    public function databarang(){
        return view('admin/databarang');
    }

    public function datapetugas(){
        return view('admin/datapetugas');
    }

    public function coba(){
        return view('user/index');
    }
}