<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-----------
//url: public/login
// Route::get('login',function(){
//     /*
//       laravel goi view thong qua 2 cach
//       c1: return View::make('tenview)
//       c2: return view('tenview')
//       */
//       // neu dang nhap roi thi k ve login tren url duoc
//       if(Auth::check()){
//         return redirect('admin/tasks');
//       }
//       return View::make('backend.Login');
     
//   });
//   //sau khi an submit
//   Route::post('login',function(){
//     //lay gia tri form
//     $email = request("email");
//     $password = request("password");
//     //Auth::attempt -> tra ve true neu email,pass khop voi ban ghi trong ban users
//     if(Auth::Attempt(["email"=>$email,"password"=>$password]))
//       return redirect(url("admin/tasks"));
//     else
//       return redirect(url("login?notify=invalid"));
//   });
//   //url: public/logout
//   Route::get('logout',function(){
//     Auth::logout();//auth la doi tuong co san cua laravel
//     return redirect(url("login"));
//   });
  //-----------
  //admin
  //url: public/admin
  Route::get('admin', function () {
      //redirect -> di chuyen de mot url
      //url -> tao duong dan url
      return redirect(url("admin/users"));
  });
  //-----------


//khai bao class controller o day
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
// Route::get('search',[TasksController::class,"search"])->name('search');
Route::group(['middleware'=>'check_login'], function(){
//url: public/admin/users -> hien thi danh sach cac ban ghi
Route::get("admin/users",[UsersController::class,"read"]);
//url: public/admin/users/update/id -> sua ban ghi - GET
Route::get("admin/users/update/{id}",[UsersController::class,"update"]);
//url: public/admin/users/update/id -> sua ban ghi - POST
Route::post("admin/users/update/{id}",[UsersController::class,"updatePost"]);
//url: public/admin/users/create -> tao moi ban ghi - GET
Route::get("admin/users/create",[UsersController::class,"create"]);
//url: public/admin/users/create -> sua ban ghi - POST
Route::post("admin/users/create",[UsersController::class,"createPost"]);
//url: public/admin/users/delete/id -> sua ban ghi - GET
Route::get("admin/users/delete/{id}",[UsersController::class,"delete"]);
//
Route::get("admin/users/update/permission/{id}",[UsersController::class,"update_permission"])->name('update_permission');
//----------

//url: public/admin/tasks -> hien thi danh sach cac ban ghi
Route::get("admin/tasks",[TasksController::class,"read"]);
//url: public/admin/tasks/update/id -> sua ban ghi - GET
Route::get("admin/tasks/update/{id}",[TasksController::class,"update"]);
//url: public/admin/tasks/update/id -> sua ban ghi - POST
Route::post("admin/tasks/update/{id}",[TasksController::class,"updatePost"]);
//url: public/admin/tasks/create -> tao moi ban ghi - GET
Route::get("admin/tasks/create",[TasksController::class,"create"]);
//url: public/admin/tasks/create -> sua ban ghi - POST
Route::post("admin/tasks/create",[TasksController::class,"createPost"]);
//url: public/admin/tasks/delete/id -> sua ban ghi - GET
Route::get("admin/tasks/delete/{id}",[TasksController::class,"delete"]);
//----------
});
//url: public/admin/tasks -> hien thi danh sach cac ban ghi
Route::group(['middleware'=>'check_url'],function(){
  Route::get("admin/tasks",[TasksController::class,"read"]);

 

});

//dki
Route::get("register",[RegisterController::class,"register"])->name('register');
Route::post("register",[RegisterController::class,"registerPost"])->name('register');

//login,logout
Route::get("login",[LoginController::class,"login"]);
Route::post("login",[LoginController::class,"loginPost"]);
Route::get("logout",[LoginController::class,"logout"]);

//search
Route::get("search",[TasksController::class,"search"])->name('search');
Route::get('/', function () {
    return view('welcome');
});
