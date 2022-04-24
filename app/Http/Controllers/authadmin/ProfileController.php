<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id){
        return view("authadmin.profile.index");
    }

    public function edit(){
        //
        return view("authadmin.profile.edit");
    }
    



}