
@extends('template.firsttry')

@section('script')
<script>
function deleteArticle() {
    confirm("你确定要删除该博文吗");
}
</script>
@show
@section('middle')
<div class="capacity">
    <table class="table-info">
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
            </tr>
            <tr>
                <td colspan="4" readonly style="font-weight:bold">{{$result[$key]->title}}</td>
            </tr>
            <tr>
                <td colspan="4" readonly>{{$result[$key]->content}}</td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="button" onclick="window.position.href('/updateArticle/{{$result[$key]->id}}')" value="修改博文">
                    <input type="button" onclick="deleteArticle()" value="删除博文">
                </td>
            </tr>
            @endforeach
        @endif
    </table>
</div>
{{--<!--deleteArticle({{$result[$key]->id}})-->--}}
@endsection