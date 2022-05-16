<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Amis;
use Image;

class UserController extends Controller
{
  
  public function profile()
  {
      return view('profile')->withUser(Auth::user());
  }

  public function show() {

    return view('user')->withUser(Auth::user());
  }

 

   
    public function abonne_user(Request $request){
      if($request->ajax())
        {
          $rep=0;
         $user= $request->id_user;
         $following=null;
         $following=Amis::where('user_id',$user)->where('user_id2',$user)->first();
         if($following){

          $del=Amis::where('user_id',$user)->where('user_id2',$user)->delete();
          $rep=2;
         }
         else{
          $amis=new Amis();
          $amis->user_id= $user;
          $amis->user_id2= $user;
          $save=$amis->save();
          if($save) $rep=1;
         }
    
         

           return response()->json([
            'reponse'=>$rep, 

            ]);
        }
    }

    public function abonne_users(Request $request){
      if($request->ajax())
        {
          $rep=0;
         $user= $request->id_user;
         $userfollow= $request->id_userfollow;
         $following=null;
         $following=Amis::where('user_id',$user)->where('user_id2',$userfollow)->first();
         if($following){

          $del=Amis::where('user_id',$user)->where('user_id2',$userfollow)->delete();
          $rep=2;
         }
         else{
          $amis=new Amis();
          $amis->user_id= $user;
          $amis->user_id2= $userfollow;
          $save=$amis->save();
          if($save) $rep=1;
         }
    
         

           return response()->json([
            'reponse'=>$rep, 

            ]);
        }
    }

    public function search(Request $request){
      
      $name=$request->text_name;
      $search=User::where('name','like','%'.$name.'%')->orWhere('prenom','like','%'.$name.'%')->get();
      return view('profiles.search',compact('search'));
    }

} 

