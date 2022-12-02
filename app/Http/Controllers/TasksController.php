<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//trong controller muon su dung doi tuong nao thi phai khai bao o ady
use View;//hien thi view
//doi tuong thao tac csdl
use DB;

class TasksController extends Controller
{
    //url: public/admin/tasks
    public function read(){
        /*
        truy van du lieu
       
        paginate(4) <=> phan 4 ban ghi tren mot trang
        */
        $data = DB::table("tasks")->get();//tac dong voi bang user lay ra het thong tin 
        return View::make("backend.TasksRead",["data"=>$data]);//tra ve view
    }
    //update GET
    public function update($id){
        $record =  DB::table("tasks")->where("id","=",$id)->first();
        return view("backend.TasksUpdate",["record"=>$record]);
    }
    //update - POST
    public function updatePost($id){
        $title = request("title");
        $description = request("description");
        //update name
        
        if($title != '' ){
            DB::table("tasks")->where("id","=",$id)->update(["title"=>$title,"description"=>$description]);
            
        }
        return redirect(url('admin/tasks'));
    }
    //create GET
    public function create(){
        return view("backend.TasksCreate");
    }
    //create - POST
    public function createPost(){
        $title = request("title");
        $description = request("description");
    //create name
        if($title != '' ){
            DB::table("tasks")->insert(["title"=>$title,"description"=>$description]);
            return redirect(url('admin/tasks'));
        }else{
            echo '<script>alert("Vui long nhap Title")</script>';
            return view("backend.TasksCreate");
        }

    }
    //delete
    public function delete($id){
        //lay mot ban ghi
        DB::table("tasks")->where("id","=",$id)->delete();
        //di chuyen den mo url khac
        return redirect(url("admin/tasks"));
    }
}
