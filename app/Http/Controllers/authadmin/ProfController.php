<?php

namespace App\Http\Controllers\authadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;

class ProfController extends Controller
{
    public function index(){
        $users = User::All();
       return view("authadmin.profile.index",compact('users'));
   }

    public function edit(){
        //
        return view("authadmin.profile.edit");
    }
}
