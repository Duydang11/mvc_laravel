<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use View;

class Users extends Model
{
    use HasFactory;
    //delete
    public function modeldelete($id){
        //lay 1 ban ghi
        DB::table("users")->where("id","=",$id)->delete();
        
    }
}
