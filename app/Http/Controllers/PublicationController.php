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
        // dd($request);
        // return $request->all();
       
        $pub = new Publication();
        $pub->user_id=Auth::user()->id;
        $pub->type=$request->input('type');
        $pub->file=$request->input('file');
        $pub->statu=$request->input('statu');
        $pub->droit=$request->input('droit');
        $pub->save();
        session()->flash('success','envoyer la publication');
        return redirect('/home');
    }
}
