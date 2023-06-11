<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use View;
use DB;
use Hash;
use App\Models\RegisterModel;

class RegisterController extends Controller
{
    //tao bien $model (la mot bien trong class NewsController)
   public $model;
   //ham tao
   public function __construct(){
       //gan bien $model tro thanh bien object cua class News
       $this->model = new RegisterModel();//khi do tu bien model co the truy cap duoc vao cac ham, bien cua class News tu day
   }
     //register get
     public function register(){
       
        return view('backend.register');
    }
    //register post
    public function registerPost(RegisterRequest $request){
      
        
        $this->model->modelregisterPost($request);
        return redirect(url("login"))->with('msg','Ban da dang ky thanh cong');
        

    }
}

