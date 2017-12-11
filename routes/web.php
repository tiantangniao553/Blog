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
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});
//主页
Route::get('/index',function(){
    return view('index');
});

Route::get('/f', function () {
    return view('firsttry');
});

//假主页
Route::get('/try',function (){
    if(Auth::check())
    {
        $a = new TestController();
        return $a->getSelfInfo();
    }
    return redirect(url('index'));
});

//查询
Route::get('select',function() {
    return view('select');
});

Route::get("mysql","MysqlController@chaxun");

Route::get("test", "MyController@first_try");


//获取特定博文 1
Route::get("/visitor/blog/{id}","TestController@getSpecific");

//获取全部博文 2
Route::get("/visitor/blog/u/{id}","TestController@getAll");

//获取博主信息 3
Route::get("/visitor/u/{id}","TestController@getInfo");

//获取自己博文
Route::get("/blog/p","TestController@getSelf")
    ->middleware("checkvisitor");

//发表一篇博文
Route::get("writeArticle",function () {
    return view('writeArticle',['authorid' => Auth::id()]);
})->middleware('checkvisitor');

Route::post("/blog","TestController@publish")
    ->middleware("checkvisitor");

//修改博文 check
Route::get("/updateArticle/{id}",function($id) {
    $res = (new TestController())->showDetail($id);
    return view('modifyarticle',['res'=>$res]);
});
Route::put("/blog/{id}","TestController@modifyArticle")
    ->middleware("checkvisitor");

//删除自己的博文 check
Route::delete("/blog/{id}","TestController@deleteArticle")
    ->middleware("checkvisitor");

//查看特定博文
Route::get("/blog/{id}","TestController@showDetail")
    ->middleware("checkvisitor");

//删除评论 check
Route::delete("/comment/{id}","TestController@deleteComment")
    ->middleware("checkvisitor");

//添加评论
Route::post("comment/blog/{id}","TestController@addComment")
    ->middleware("checkvisitor");
//查看评论
Route::get("comment/blog/{id}","TestController@selectComment");

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
