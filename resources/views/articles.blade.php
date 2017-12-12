
@extends('template.firsttry')

@section('script')
<script>
function writeArticle() {
    window.location.href = '/writeArticle';
}
function deleteArticle(id) {
    if(confirm("你确定要删除该博文吗")) {
        fetch('/blog/'+id, {
            method: "DELETE",
            body:new FormData()
        });
    }
}

function modifyarticle(id) {
    window.location.href = '/updateArticle/' + id;
}

function showComment(id) {
    window.location.href = '/visitor/blog/' + id;
}

function addComment(id) {
    window.location.href = '/writeComment/' + id;
}
</script>
@show
@section('middle')
<div class="capacity">
    <table class="table-info">
        <tr>
            <td colspan="4">
                <input type="button" value="我要写博文" onclick="writeArticle()">
            </td>
        </tr>
        <tr>
            <td width="125px">博主id</td>
            <td width="125px">{{$authorid}}</td>
            <td width="125px">博主姓名</td>
            <td width="125px">{{$name}}</td>
        </tr>
        @if(isset($res->message))

        @else
            @foreach($result as $key=>$value)
            <tr>
                <td>博文id</td>
                <td>{{$result[$key]->id}}</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4" readonly style="font-weight:bold">{{$result[$key]->title}}</td>
            </tr>
            <tr>
                <td colspan="4" readonly>{{$result[$key]->content}}</td>
            </tr>
            <tr>
                <td colspan="4">
                @if(Auth::id() == $authorid)
                    <input type="button" value="修改博文" onclick="modifyarticle({{$result[$key]->id}})">
                    <input type="submit" value="删除博文" onclick="deleteArticle({{$result[$key]->id}})">
                @endif
                    <input type="button" value="查看评论" onclick="showComment({{$result[$key]->id}})">
                    <input type="button" value="添加评论" onclick="addComment({{$result[$key]->id}})">
                </td>
            </tr>
            @endforeach
        @endif
    </table>
</div>
@endsection