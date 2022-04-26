<?php

namespace App\Http\Controllers\authadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view("authadmin.layout.index");
    }

    public function edit(){
        //
        return view("authadmin.profile.edit");
    }

    public function logout(Request $request)
    {
        $request->session()->forget('authadmin');
		 return redirect()->route('authadmin.login'); 
    }

    public function login(){
        return view("authadmin.login");
    }
}
