<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Art;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index($id){
        return view("authadmin.categorie.index");
    }

    public function edit(){
        //
        return view("authadmin.categorie.edit");
    }
    



}