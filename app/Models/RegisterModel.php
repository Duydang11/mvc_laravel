<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\RegisterRequest;
use DB;
use Hash;

class RegisterModel extends Model
{
    use HasFactory;
    //register post
    public function modelregisterPost(RegisterRequest $request){
      
        
        $name = request("name"); //<=> Request::get("name");
        $email = request("email"); //<=> Request::get("email");
        $password = request("password"); //<=> Request::get("password");
        $diachi = request("address");
        $ngaysinh = request("dob");
        $gioitinh = request("gioitinh");
        $sothich = request("sothich");
        $username = request("username");
        //ma hoa password
        $password = Hash::make($password);
        //kiem tr xem email da ton tai chua, neu chua ton tai thi moi cho insert
        $countEmail = DB::table("users")->where("email","=",$email)->Count();//lay ra so email trung voi email da nhap
        if($countEmail == 0){//neu k co email nao trung nhau
            //insert ban ghi
            DB::table("users")->insert(["name"=>$name,"email"=>$email,"password"=>$password ,"address"=>$diachi,"dob"=>$ngaysinh, "gioitinh"=>$gioitinh,"sothich" => $sothich,"username"=>$username]);        
            //di chuyen den mot url khac
        }

    }
}
