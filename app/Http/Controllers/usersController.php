<?php

namespace App\Http\Controllers;

use App\Models\barangmodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{
    public function indexuser(){
        $contacts = barangmodel::all();
        return view('user/index',['contacts' =>$contacts]);
    }
}
