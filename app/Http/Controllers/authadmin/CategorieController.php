<?php

namespace App\Http\Controllers\authadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Art ;

class CategorieController extends Controller
{
    public function index(){
        $arts = Art::All();
        return view("authadmin.categorie.index",compact('arts'));
    }

    public function edit(){
        //
        return view("authadmin.categorie.edit");
    }
    public function store(Request $request){
       
        $arts = new Art();
        $arts->type=$request->input('type');
        $arts->save();
        return redirect('/authadmin/Categorie');
    }

    public function destroy(Request $request ,$id){
        $art = Art::find($id);
        $art->delete();
        return redirect('authadmin/Categorie');
    }
}
