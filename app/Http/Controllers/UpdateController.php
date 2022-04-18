<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UpdateController extends Controller
{
    
    //
   public function editpage($id){
       $user=User::find($id);
       return view('editpage',compact('user'));
   }
   public function update(Request $request,$id){
    $user=user::find($id);
      
    if($request->file('file')){
        $file=$request->file('file');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('stortage',$filename);
        $user->image=$filename;

    }
  
    $user->name=$request->name;
    $user->email=$request->email;
  
    
    $user->save();
    return redirect()->back();
    





   }
    






}

