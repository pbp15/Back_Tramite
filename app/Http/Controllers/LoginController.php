<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
  
    public function login(Request $request){
       
      $this->validateLogin($request);
      if(Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password, 'condicion'=>1])){
        
        $token = $request->user()->createToken($request->usuario);
        
        return response()->json([
            'usuario'=>$request->usuario,
            'token' => $token->plainTextToken,
            ]);
      }
  
      return back()->withErrors(['usuario' => trans('auth.failed')])
      ->withInput(request(['usuario']));
    }
  
    protected function validateLogin(Request $request){
          $this->validate($request,[
            'usuario' => 'required|string',
            'password'=> 'required|string'
        ]);
    }
  
    public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      return redirect('/');
      
    }
}
