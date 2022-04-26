<?php

namespace App\Http\Controllers\authadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Art ;

class CategorieController extends Controller
{
    public function index($id){
        $arts = Art::All();
        return view("authadmin.categorie.index",compact('arts'));
    }

    public function edit(){
        //
        return view("authadmin.categorie.edit");
    }
}
