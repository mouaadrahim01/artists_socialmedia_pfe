<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Message ;
use App\Models\Message;
use App\Models\User ;



use Auth ;
class MessageController extends Controller
{

   public function index(Request $request,$id=null) {
    $user=null;
    if($id) $user=User::find($id);
    if($_POST){
      
     $amis=new Message();
     $amis->user_id= Auth::user()->id;
     $amis->recepteur_id= $request->recepteur;
     $amis->contenu= $request->message;
     $save=$amis->save();
     if($save) $rep=1;
     $user=User::find($request->recepteur);
    }
    

    $users=User::paginate(8);
     
      

       return view('conversations.index',compact('user','users'));
    }


   public function send(Request $request){
   
    
        $rep=0;
        
        $amis=new Message();
        $amis->user_id= Auth::user()->id;
        $amis->recepteur_id= $request->recepteur;
        $amis->contenu= $request->message;
        $save=$amis->save();
        if($save) $rep=1;
    
    
       

         return back();
  }



  public function sendz(Request $request){
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








}


