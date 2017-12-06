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
        if($res)
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

        if(!$res)
            return response()->json(['message'=>'He is too lazy to leave anything']);

        $i=0;
        $result=[];

        foreach ($res as $key => $value)
        {
            if($res[$key]->hasdelete == 0)
            {
                $result[$i] = $value;
                $i++;
            }
        }

        $res = $testservice1->selectinfo($id);

        return view('articles',['result'=>$result,'authorid'=>$res->id,'name'=>$res->name]);

    }
    //获取博主信息 v
    public function getInfo()
    {
        $id=Auth::id();
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
    public function getSelf($id)
    {
        if(!Auth::check())
            return redirect('login');

        $testservice1 =new Testservice();

        $res = $testservice1->selectSelf(Auth::id());
        if($res)
            return response()->json($res);
        return response()->json(['message'=>'you haven\'t writen any article']);

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
            return view('')
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
    //写评论
    public function writeComment($id)
    {
        if(!Auth::check())
            return url('login');

        return view('writeComment',['id'=>$id,'authorid'=>Auth::id()]);
    }

    //添加评论
    public function addComment(Request $request)
    {
        $testservice1 = new Testservice();
        $res = $testservice1->addComment($request);
        if($res)
            return response()->json(["message"=>"add something indescribable"]);
        return response()->json(["message"=>"fail to add something"]);
    }
    //获取个人信息 v
    public function getSelfInfo()
    {
        if(!Auth::check())
            return redirect('login');

        $id=Auth::id();
        $testservice1 = new Testservice();
        $res = $testservice1->selectSelfInfo($id);

        return view('information',['id'=>$res->id,'name'=>$res->username,'photo'=>$res->photo_addr]);
    }
    public function selectInfo()
    {
        if(!Auth::check())
            return route('login');

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
        if(!Auth::check())
            return url('login');

        $testservice1 = new Testservice();
        $res = $testservice1->modifySelfMessage($request);
        if($res)
            return response()->json(["message"=>"modify your own infomation successfully"]);
        return response()->json(["message"=>"fail to modify your own infomation"]);
    }
}
