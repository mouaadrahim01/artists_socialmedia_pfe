<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Publication;

use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index($id){
        return view("authadmin.publication.index");
    }

    public function edit(){
        //
        return view("authadmin.publication.edit");
    }
    



}