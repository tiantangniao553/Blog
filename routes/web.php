<?php

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

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/f', function () {
    return view('firsttry');
});

Route::get('/try','TestController@getselfInfo');

Route::get('select',function() {
    return view('select');
});

Route::get("test", "MyController@first_try");

Route::get("mysql","MysqlController@chaxun");


//获取特定博文 1
Route::get("/visitor/blog/{id}","TestController@getSpecific");

Route::get("/selectById",function(){
    $id=input::get('id');
    return redirect(url("visitor/blog/{$id}"));
});

//获取全部博文 2
Route::get("/visitor/blog/u/{id}","TestController@getAll");

//获取博主信息 3
Route::get("/visitor/u/{id}","TestController@getInfo");

//获取自己博文
Route::get("/blog/p/{page}","TestController@getSelf")
    ->middleware("checkvisitor");

//发表一篇博文
Route::post("/blog","TestController@publish")
    ->middleware("checkvisitor");

//修改自己的博文 check
Route::put("/blog/{id}","TestController@modifyArticle")
    ->middleware("checkvisitor");

//删除自己的博文 check
Route::post("/updateArticle","TestContrloller@");
Route::delete("/blog/{id}","TestController@deleteArticle")
    ->middleware("checkvisitor");

//查看特定博文
Route::get("/blog/{id}","TestController@showDetail")
    ->middleware("checkvisitor");

//删除评论 check
Route::delete("/comment/{id}","TestController@deleteComment")
    ->middleware("checkvisitor");

//添加评论
Route::get("addComment/{id}","TestController@writeComment");

Route::post("comment/blog/id","TestController@addComment")
    ->middleware("checkvisitor");

//查看个人信息
Route::get("/user","TestController@getSelfInfo")
    ->middleware("checkvisitor");

//修改个人信息
Route::get("/updateinfo","TestController@selectInfo");


Route::put("/user","TestController@modifySelfInfo")
    ->middleware("checkvisitor");


Route::get('/home', 'HomeController@index')->name('home');
//上传文件
Route::get('upload',function () {
    return view('uploadfile');
});

Route::post('/uploadfile','UploadController@uploadFile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
