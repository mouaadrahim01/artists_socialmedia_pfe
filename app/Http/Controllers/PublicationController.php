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
        $publications = Publication::wherein('user_id')->latest()->paginate(5);
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

    public function edit($id){
        $publication = Publication::find($id);
        return view('publications.edit',['publication' => $publication]);
    }

    public function update(Request $request ,$id){
        $publication = Publication::find($id);
        $publication->type=$request->input('type');
        $publication->statu=$request->input('statu');
        $publication->droit=$request->input('droit');
        
        $imageName = time().'.'.$request->image->extension();
          $request->image->move(public_path("files"),$imageName);
         
          if(($img=$publication->file)){
            if(file_exists(public_path("images/$img")))
                unlink(public_path("images/$img"));
        }
          $publication->file=$imageName;
       
        $publication->save();
        session()->flash('success','envoyer la publication');
        return redirect('/home');
    }

    public function destroy(Request $request ,$id){
        $publication = Publication::find($id);
        $publication->delete();
        return redirect('profile');
    }

}
