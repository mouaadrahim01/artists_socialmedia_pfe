<?php

namespace App\Http\Controllers\authadmin;
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        die();
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