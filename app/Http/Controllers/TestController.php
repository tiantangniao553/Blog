<?php

namespace App\Http\Controllers;

use App\Http\TestModel2;
use Illuminate\Http\Request;
use App\service\Testservice;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    //获取特定博文  v
    public function getSpecific($id)
    {
        $testservice1 =new Testservice();
        $res = $testservice1->selectSpecific($id);
        if($res->hasdeleted == 0)
        {
            return view('article',['id'=>$id,'authorid'=>$res->authorid,'content'=>$res->content,'title'=>$res->title]);
        }
        return response()->json(['message'=>'No such article']);

    }
    //获取所有博文 v
    public function getAll($id)
    {
        $testservice1 =new Testservice();
        $res = $testservice1->selectAll($id);

        if(sizeof($res) == 0)
            return response()->json(['message'=>'He is too lazy to leave anything']);

        $i=0;
        $result=[];

        foreach ($res as $key => $value)
        {
            if($res[$key]->hasdelete == 0)
            {
                echo($key);
                $result[$i] = $value;
                $i++;
            }
        }

        $res = $testservice1->selectinfo($id);

        return view('articles',['result'=>$result,'authorid'=>$res->id,'name'=>$res->name]);

    }
    //获取博主信息 v
    public function getInfo($id)
    {
        $testservice1 =new Testservice();
        $res = $testservice1->selectinfo($id);
        if($res)
            return view('information',[
                'id'=>$res->id,
                'name'=>$res->name,
                'photo'=>$res->photo_addr
            ]);
        return response()->json(['message'=>'No such person']);

    }
    //获取自己的博文 v
    public function getSelf()
    {
        $testservice1 =new Testservice();
        $id = Auth::id();
        $res = $testservice1->selectSelf($id);
        if(sizeof($res) == 0)
            return response()->json(['message'=>'you haven\'t writen any article']);

        $i=0;
        $result=[];
        foreach ($res as $key => $value)
        {
            if($res[$key]->hasdelete == 0)
            {
                echo($key);
                $result[$i] = $value;
                $i++;
            }
        }

        $res = $testservice1->selectinfo($id);

        return view('articles',['result'=>$result,'authorid'=>$res->id,'name'=>$res->name]);

    }
    //发表博文 v
    public function publish(Request $request)
    {
        $testservice1 =new Testservice();
        $res = $testservice1->publish($request);
        if($res)
            return response()->json(["message"=>"publish an article successfully",'success'=>true]);
        return response()->json(["message"=>"fail to publish an article"]);
    }

    //修改博文 v
    public function modifyArticle(Request $request)
    {
        $testservice1 =new Testservice();
        $res = $testservice1->modifyArticle($request);

        if($res === 'not hiself article')
            return response()->json(["message"=>"cannot modify other's article"]);
        else if($res)
            return response()->json(['success'=>true, "message"=>"modify something amazing"]);
        return response()->json(["message"=>"fail to modify"]);
    }
    //删除博文
    public function deleteArticle($id)
    {
        $testservice1 =new Testservice();
        $res = $testservice1->deleteArticle($id);
        if($res ==='not hiself article')
            return response()->json(["message"=>"cannot delete other's article"]);
        else if($res)
            return response()->json(['success'=> true,"message"=>"you has deleted something marvelous"]);
        return response()->json(['message'=>'fail to delete sth']);
    }
    //查看特定博文
    public function showDetail($id)
    {
        $testservice1 =new Testservice();
        $res = $testservice1->selectDetail($id);

        if($res->hasdeleted == 0)
            return $res;
        return response()->json(['message'=>'no such article']);
    }
    //删除评论
    public function deleteComment($id)
    {
        $testservice1 =new Testservice();
        $res = $testservice1->deleteComment($id);
        if($res === 'not hiself comment')
            return response()->json(["message"=>"cannot delete other's article"]);
        else if($res)
            return response()->json(['success'=>true,"message"=>"some great comment has fallen"]);
        return response()->json(["message"=>"fail to delete something"]);
    }
    //查看评论
    public function selectComment($id)
    {
        $testserver1 = new Testservice();
        $res = $testserver1->selectComment($id);

        $result=[];
        $i=0;
        foreach($res as $key=>$value)
        {
            if($res[$key]->hasdeleted == 0)
            {
                $result[$i] = $res[$key];
                $i++;
            }
        }
        if(sizeof($result))
            return view('comments',['result'=>$result]);
        return response()->json(['message'=>'no comments for this article now']);
    }
    //写评论(跳转)
    public function writeComment($id)
    {
        return view('writeComment',['id'=>$id,'authorid'=>Auth::id()]);
    }

    //添加评论
    public function addComment(Request $request)
    {
        $testservice1 = new Testservice();
        $request->commentedid = Input::get('id');
        $res = $testservice1->addComment($request);
        if($res)
            return response()->json(["message"=>"add something indescribable"]);
        return response()->json(["message"=>"fail to add something"]);
    }
    //获取个人信息 v
    public function getSelfInfo()
    {
        $id=Auth::id();
        $testservice1 = new Testservice();
        $res = $testservice1->selectSelfInfo($id);

        return view('information',['id'=>$res->id,'name'=>$res->username,'photo'=>$res->photo_addr]);
    }

    public function selectInfo()
    {
        $id=Auth::id();
        $testservice1 = new Testservice();
        $res = $testservice1->selectSelfInfo($id);

        return view('updateinfo',[
            'id'=>$res->id,
            'name'=>$res->name,
            'photo'=>$res->photo_addr
        ]);

    }
    //修改个人信息
    public function modifySelfInfo(Request $request)
    {
        $testservice1 = new Testservice();
        $res = $testservice1->modifySelfMessage($request);
        if($res)
            return response()->json(["message"=>"modify your own infomation successfully"]);
        return response()->json(["message"=>"fail to modify your own infomation"]);
    }
}
