<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
class AdminController extends Controller
{
    public function LoginAdmin(Request $request){
      if(auth()->check()){
          return redirect()->to('home');
       }
        return redirect()->to('login');
    }
    public function logout(){
//        Session::put('name', null);
//        Session::put('id', null);
//        return redirect()->route('admin.login');
        auth()->logout();
        return redirect()->route('admin.login');

    }
    public function PostLoginAdmin(Request $request){
        $remember = $request->has('remember_me')? true : false;
        if(auth()->attempt([
            'email'=> $request->email,
            'password'=>$request->password
        ], $remember)){
            return redirect()->to('home');
        }
//        $email = $request->email;
//        $password = $request->password;
//        $result = DB::table('users')->where('email', $email)->where('password', $password)->first();
//        if($result){
//            Session::put('name', $result->name);
//            Session::put('id', $result->id);
//            return Redirect::to('/home');
//        }
//        else
//        {
//            Session::put('message', 'Password or Email incorrect');
//            return view('login');
//        }

    }
}
