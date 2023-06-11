<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;

class LoginController extends Controller

{
    public function login(){
        if(Auth::check()){
            return redirect('admin/tasks');
          }
          return View::make('backend.Login');
    }
    public function loginPost(){
        //lay gia tri form
    $email = request("email");
    $password = request("password");
    //Auth::attempt -> tra ve true neu email,pass khop voi ban ghi trong ban users
    if(Auth::Attempt(["email"=>$email,"password"=>$password]))
      return redirect(url("admin/tasks"));
    else
      return redirect(url("login?notify=invalid"));
    }
    public function logout(){
        Auth::logout();//auth la doi tuong co san cua laravel
    return redirect(url("login"));
    }
}
