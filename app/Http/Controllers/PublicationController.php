<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Dotenv\Validator;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class PublicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
    }

    public function create(){
        return view('publications.create');
    }

    public function store(Request $request){
       
        $pub = new Publication();
        $pub->user_id=Auth::user()->id;
        $pub->type=$request->input('type');
        $pub->statu=$request->input('statu');
        $pub->droit=$request->input('droit');
        
        $imageName = time().'.'.$request->image->extension();
          $request->image->move(public_path("files"),$imageName);
         
          if(($img=$pub->file) && $pub->file!='null'){
            if(file_exists(public_path("images/$img")))
                unlink(public_path("images/$img"));
        }
          $pub->file=$imageName;
       
        $pub->save();
        session()->flash('success','envoyer la publication');
        return redirect('/home');
    }
}
