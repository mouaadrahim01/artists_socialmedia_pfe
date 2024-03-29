<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Hash;
class UpdateController extends Controller
{
    
  
   public function editpage($id){
       $user=User::find($id);
       return view('editpage',compact('user'));
   }
   
   public function update(Request $request,$id){
    $user=user::find($id);
    

    $user->update([
    'name'=>$request->name,
    'prenom'=>$request->prenom,
    'email'=>$request->email,
    'description'=>$request->description,
    ]);
   
    if($request["password"] != "")
            $user->password=Hash::make($request["password"]);
        $user->save();
    return redirect('/profile');
    }


    
    public function uploadImage(Request $request){
        
          $imageName = time().'.'.$request->avatar->extension();
          $request->avatar->move(public_path("/uploads/images/"),$imageName);
          $user=Auth::user();
          if(($img=$user->image) && $user->image!='default.png'){
            if(file_exists(public_path("/uploads/images/$img")))
                unlink(public_path("/uploads/images/$img"));
        }
          $user->image=$imageName;
          $user->save();
                
        return redirect('/home')->withSuccess('L\'image à été modifier avec succès');
    }

}

