<?php

namespace App\Http\Controllers\authadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexAdminController extends Controller
{
    public function index(){
        
        return view("authadmin.layout.index");
    }
}
