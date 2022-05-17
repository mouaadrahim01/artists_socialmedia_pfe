<?php

namespace App\Http\Controllers\authadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdmAdmin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $error_login=null;
        if ( $request->isMethod('post') ) {
            
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required',
            ]);
            $email = $request->get('email');
            $password = $request->get('password');
            
            $AdmAdmin = AdmAdmin::where('email', $email)->first();
            
            if ( $AdmAdmin ) {
                
                if (Hash::check($password, $AdmAdmin->password)) {
                    
                    $request->session()->put('authadmin', $AdmAdmin);
                    return redirect()->route('authadmin.index');
                    
                }
                
            }
            
            $error_login = trans('auth.failed');            
        }
        return view('authadmin.login', compact('error_login'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('authadmin');
		 return redirect()->route('authadmin.login'); 
    }
}
