<?php
/**
 * Created by PhpStorm.
 * User: 13566
 * Date: 2017/11/8
 * Time: 21:42
 */
namespace App\Service;

use App\Http\ModifyModel;
use App\Http\TestModel3;
use App\Http\TestModel2;
use App\Http\TestModel1;
use App\Http\ModefyModel;
use database\seeds\MySeeder;
use Illuminate\Support\Facades\Auth;
use Models\Test;

class Testservice
{
    //
    public function selectSpecific($id)
    {
        return TestModel1::find($id);
    }

    public function selectAll($id)
    {
        return TestModel1::where('authorid',$id)->get();
    }

    public function selectinfo($id)
    {
        return TestModel3::find($id);
    }

    public function selectSelf($id)
    {
        return TestModel1::where('authorid',$id)->get();
    }


    public function publish($data)
    {
        $res = new TestModel1;
        $res->title = $data->title;
        $res->content = $data->content;
        $res->authorid = Auth::id();
        if($res->save())
            return true;
        return false;
    }


    public function modifyArticle($data)
    {
        $check_id = Auth::id();
        $res = TestModel1::find($data->id);
        if($res->authorid != $check_id)
            return "not hiself article";

        $res->title = $data->title;
        $res->content = $data->content;
        if($res->save())
            return true;
        return false;
    }

    public function deleteArticle($id)
    {
        $res = TestModel1::find($id);
        $check_id = config('app.userID');

        if($check_id != $res->authorid)
            return 'not hiself article';

        $res->hasdelete = 1;
        if($res->save())
            return true;
        return false;
    }

    public function selectComment($id)
    {
        return TestModel2::where('commentedid',$id)->get();
    }

    public function deleteComment($id)
    {
        $res = TestModel2::find($id);
        $check_id = config('app.userID');

        if($check_id != $res->authorid)
            return 'not hiself article';

        $res->hasdelete = 1;
        if($res->save())
            return true;
        return false;
    }

    public function addComment($data)
    {
        $res = new TestModel2;
        $res->content = $data->content;
        $res->authorid = $data->authorid;
        $res->commentedid = $data->commentedid;
        if($res->save())
            return true;
        return false;
    }

    public function selectOneComment($id)
    {

        return TestModel2::find($id);
    }

    public function selectSelfInfo($id)
    {
        return TestModel3::find($id);
    }

    public function modifySelfMessage($data)
    {
        $id=Auth::id();
        $res = TestModel3::find($id);
        $res->name = $data->name;
        $res->photo_addr = $data->photo_addr;
        if($res->save())
            return true;
        return false;
    }
}
