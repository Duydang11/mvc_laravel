<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\Users;

//trong controller muon su dung doi tuong nao thi phai khai bao o ady
use View;//hien thi view
//doi tuong thao tac csdl
use DB;
//doi tuong ma hoa password
use Hash;

class UsersController extends Controller
{
    public $model;
    //ham tao
    public function __construct(){
        //gan bien $model tro thanh bien object cua class News
        $this->model = new Users();//khi do tu bien model co the truy cap duoc vao cac ham, bien cua class News tu day
    }
    //url: public/admin/users
    public function read(){
        /*
        truy van du lieu
        DB::table("user") <=> tac dong vao bang user
        orderBy("id","desc") <=> order by id desc
        paginate(4) <=> phan 4 ban ghi tren mot trang
        */
        $data = DB::table("users")->get();//tac dong voi bang user lay ra 2 th id voi desc ,tra ve  4 ban ghi 
        return View::make("backend.UsersRead",["data"=>$data]);//tra ve view 
       
       
    }
    //update - GET 
    public function update($id){
        //first() <=> lay 1 ban ghi
        //lay 1 ban ghi
        $record = DB::table("users")->where("id","=",$id)->first();//lay ra trong database 1 ban ghi co id = tham so truyen vao
        return View::make("backend.UsersUpdate",["record"=>$record]);
    }
    //update - POST
    public function updatePost(UsersUpdateRequest $request,$id){
     
        $name = request("name"); //<=> Request::get("name");
        // $email = request("email");

        
        DB::table("users")->where("id","=",$id)->update(["name"=>$name]);//update lai name co id = id trueyn vao
        return redirect(url("admin/users"));
        // $password = request("password");
        //update name
       
        //neu password k rong thi upadte password
        // if($password == null){
        //      DB::table("users")->where("id","=",$id)->update(["name"=>$name,"email"=>$email]);//update lai name co id = id trueyn vao
        //       return redirect(url("admin/users"));
        // }else{
        //     //ma hoa password
        //     $password = Hash::make($password); 
        //     DB::table("users")->where("id","=",$id)->update(["password"=>$password,"name"=>$name,"email"=>$email]);//neu pass k rong thi update
        //     //di chuyen den 1 url khac
        //     return redirect(url("admin/users"));
        // }
    
    
    }
     //create - GET
     public function create(){
       
        return View::make("backend.UsersCreate");
    }
     //create - POST
    public function createPost(UsersRequest $request){
        
        $name = request("name"); //<=> Request::get("name");
        $email = request("email"); //<=> Request::get("email");
        $password = request("password"); //<=> Request::get("password");
        //ma hoa password
        $password = Hash::make($password);
        //kiem tr xem email da ton tai chua, neu chua ton tai thi moi cho insert
        $countEmail = DB::table("users")->where("email","=",$email)->Count();//lay ra so email trung voi email da nhap
        if($countEmail == 0){//neu k co email nao trung nhau
            //insert ban ghi
            DB::table("users")->insert(["name"=>$name,"email"=>$email,"password"=>$password]);        
            //di chuyen den mot url khac
            return redirect(url("admin/users"))->with('msg','Ban da them thanh cong');
        }
    }
    //delete
    public function delete($id){
        $this->model->modeldelete($id);
        //di chuyen den 1 url khac
        return redirect(url("admin/users"));
    }

    //permission
    public function update_permission($id, Request $request){
		if($request->permission == null){
			$user = DB::table("users")->where('id',$id)->update(["level"=> 3]);
		}else{
			$user = DB::table("users")->where('id',$id)->update(["level"=> 2]);
		}
		return redirect(url("admin/users"))->with('msg','Bạn đã thay đổi thành công');//thông báo
	}
}
