<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
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

    
} 
