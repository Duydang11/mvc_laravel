<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use View;//hien thi view
//doi tuong thao tac csdl
use DB;
use App\Models\Tasks;

class TasksController extends Controller
{
    //tao bien $model (la mot bien trong class NewsController)
   public $model;
   //ham tao
   public function __construct(){
       //gan bien $model tro thanh bien object cua class News
       $this->model = new Tasks();//khi do tu bien model co the truy cap duoc vao cac ham, bien cua class News tu day
   }
    //url: public/admin/tasks
    public function read(){
        //truy van du lieu
        $data = $this->model->modelRead();
        return View::make("backend.TasksRead",["data"=>$data]);
    }
    //update GET
    public function update($id){
        $record = $this->model-> modelGetRecord($id);
        return view("backend.TasksUpdate",["record"=>$record]);
    }
    //update - POST
    public function updatePost(ProductRequest $request, $id){
        $this->model->modelUpdate($id, $request);

        
       //di chuyển đến 1 url khác
       return redirect(url("admin/tasks"));
            
        
    }
    //create GET
    public function create(){
        return view("backend.TasksCreate");
    }
  //create - POST
  public function createPost(ProductRequest $request){
    $this->model->modelCreate($request);

    return redirect(url('admin/tasks'));

}
    //delete
    public function delete($id){
        //lay mot ban ghi
        $this->model->modelDelete($id);
       

        //di chuyen den mo url khac
        
        return redirect(url("admin/tasks"));
        // ->with('msg','xóa thành công')
    }
    public function search(Request $request){
        $search = $request->search;
      $aaa =  DB::table('tasks')->where('title','like',"%" . $search  . "%")->get();    
      return view('backend.search',['aaa'=>$aaa,'search'=>$search]);

    }
}
