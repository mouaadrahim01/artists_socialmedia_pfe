<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Publication;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function view_profile($id){
        $user=User::find($id);
        $publications=Publication::where("type","poste")->where("user_id",$user->id)->get();
        return view("profiles.view",compact("user","publications"));
    }

    public function liste_amis(){
        //
        $users=User::get();
        return view("profiles.liste_amis",compact("users"));
    }
    



}
