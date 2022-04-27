<?php

namespace App\Http\Controllers\authadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;

class PubController extends Controller
{
     public function index(){
         $pubs = Publication::All();
        return view("authadmin.publication.index",compact('pubs'));
    }

    public function edit(){
        //
        return view("authadmin.publication.edit");
    }

    public function destroy(Request $request ,$id){
        $publication = Publication::find($id);
        $publication->delete();
        return redirect('authadmin/Publication');
    }
    
}
