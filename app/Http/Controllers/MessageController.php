<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message ;
use App\Models\User ;

use Auth ;
class MessageController extends Controller
{

   public function index($id=null) {
       $user=null;
       if($id) $user=User::find($id);

       $users=User::paginate(8);

       return view('conversations.index',compact('user','users'));
    }


   public function send(Request $request){
    if($request->ajax())
      {
        $rep=0;
       $message= $request->message;
       $user= $request->user;
       $message= $request->message;
       

      
        $amis=new Message();
        $amis->user_id= Auth::user()->id;
        $amis->recepteur_id= $user;
        $amis->contenu= $message;
        $amis->type_message= 1;
        $amis->Vu= 1;



        $save=$amis->save();
        if($save) $rep=1;
    
        					
       

         return response()->json([
          'reponse'=>$rep, 

          ]);
      }
  }








}


