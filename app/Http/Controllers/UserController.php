<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Amis;
use Image;


class UserController extends Controller
{
  
  public function profile()
  {
      return view('profile')->withUser(Auth::user());
  }
  public function profileUpdate(Request $request){
      //validation rules

      $request->validate([
          'name' =>'required|min:4|string|max:255',
          'email'=>'required|email|string|max:255'
      ]);
      $user =Auth::user();
      $user->name = $request['name'];
      $user->email = $request['email'];
      $user->save();
      return back()->with('message','Profile Updated');
  }

  public function show() {

    return view('user')->withUser(Auth::user());
  }
  public function update(Request $request)
    {
        $user = Auth::user();
        $user->name=$request->input('name');
        $user->email=$request->input('email');

        $user->save();
        return Redirect::route('user');
    }

    public function update_avatar (Request $request){
       //handle the user upload of image
     if($request->hasFile('image')){
        $image= $request->file('image'); 

        $filename=time().'.' . $image ->getClientOriginalExtension(); 
        Image::make($image)->resize(300, 300)->save(public_path('/uploads/images/'. $filename));
        $user=Auth::user();
        $user->image=$filename;
        $user->save();

     }
     return view('profile',array('user'=>Auth::user()));
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
} 
