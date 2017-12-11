
@extends('template.firsttry')

@section('style')
<style>
.tr1 {
    height:40px;
}
</style>
@endsection

@section('script')
<script>

</script>
@endsection

@section('middle')
<div class="capacity">
    <table class="table-info" style="width:500px;">
        <tr>
            <td colspan="2">被评论的文章</td>
        </tr>
        <tr>
            {{--<td>{{$title}}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>{{$content}}</td>--}}
        </tr>
        @foreach($result as $key=>$value)
        <tr>
            <td>评论id</td>
            <td>{{$result[$key]->id}}</td>
        </tr>
        <tr style="height:200px">
            <td colspan="2" readonly>{{$result[$key]->content}}</td>
        </tr>
        <tr>
            <td colspan="2">
                    {{--<input type="button" value="修改博文" onclick="modifyarticle({{$result[$key]->id}})">--}}
                    {{--<input type="button" value="删除博文" onclick="deleteArticle({{$result[$key]->id}})">--}}
                    {{--<input type="button" value="查看评论" onclick="Comment({{$result[$key]->id}})">--}}
                    {{--<input type="button" value="添加评论" onclick="addComment({{$result[$key]->id}})">--}}
            </td>
        </tr>
            @endforeach

    </table>
</div>

@endsection