<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\ProductRequest;
use View;//hien thi view
//doi tuong thao tac csdl
use DB;

class Tasks extends Model
{
    use HasFactory;
    //lay cac ban ghi co phan trang
    public function modelRead(){
        $data = DB::table("tasks")->orderby("id","asc")->paginate(2);         
        return $data;
    }
    
    public function modelGetRecord($id){
        $record =  DB::table("tasks")->where("id","=",$id)->first();
        return $record;
    }
      //update - POST
      public function modelUpdate( $id,ProductRequest $request){
        $title = request("title");
        $description = request("description");
        //update name
        
        
        DB::table("tasks")->where("id","=",$id)->update(["title"=>$title,"description"=>$description]);
        if($request->hasFile("photo")){
    		//---
    		//lấy ảnh củ để xóa
    		//select("photo") lấy cột photo
    		$oldPhoto = DB::table("tasks")->where("id","=",$id)->select("photo")->first();
           
           
    		if($oldPhoto->photo > 0 && file_exists("upload/news/".$oldPhoto->photo)){
                unlink("upload/news/".$oldPhoto->photo);
            }
            
    		//---
    		//Request::file("photo")->getClientOriginalName() lấy tên file
    		$photo = time()."_".$request->file("photo")->getClientOriginalName();
    		//thực hiện load ảnh
    		$request->file("photo")->move("upload/news",$photo);
    		//uploaf bản ghi
    		DB::table("tasks")->where("id","=",$id)->update(["photo"=>$photo]);
    	}
        
     
            
        
    }
     //create - POST
  public function modelCreate(ProductRequest $request){
    // $rules =[
    //     "title"=>'required',
        
    //     "description"=>'required|min:6'
    // ];
    // $messages =[
    //     'required' => 'av',
    //      'min' => 'tối thiểu 6 kí tự',
    
    // ];
    // $request->validate($rules,$messages);

    $title = request("title");
    $description = request("description");
    $photo = "";
    //neu co anh thi create anh
    if($request->hasFile("photo")){
        //Request::file("photo")->getClientOriginalName() lay ten file
        $photo = time()."_".$request->file("photo")->getClientOriginalName();
        //thuc hien upload anh
        $request->file("photo")->move("upload/news",$photo);
    }

    DB::table("tasks")->insert(["title"=>$title,"description"=>$description,"photo"=>$photo]);

}
    //delete
    public function modelDelete($id){
        //lay mot ban ghi
        DB::table("tasks")->where("id","=",$id)->delete();
       

        //di chuyen den mo url khac
        
        // ->with('msg','xóa thành công')
    }
    
}
