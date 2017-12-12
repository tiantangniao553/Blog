
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

function modifyComment(id) {
    location.href = "modifyComment" + id;
}
function deleteComment(id) {

}

</script>
@endsection

@section('middle')
<div class="capacity">
    <table class="table-info" style="width:500px;">
        <tr>
            <td width="125px">博主id</td>
            <td width="125px">{{$authorid}}</td>
            <td width="125px">博文id</td>
            <td width="125px">{{$id}}</td>
        </tr>
        <tr>
            <td colspan="4" readonly style="font-weight:bold">{{$title}}</td>
        </tr>
        <tr>
            <td colspan="4" readonly>{{$content}}</td>
        </tr>

        @foreach($result as $key=>$value)
        <tr>
            <td>评论id</td>
            <td>{{$result[$key]->id}}</td>
            <td colspan="2"></td>
        </tr>
        <tr style="height:200px">
            <td colspan="4" readonly>{{$result[$key]->content}}</td>
        </tr>
        <tr>
            <td colspan="4">
                <input type="button" value="修改评论" onclick="modifyComment({{$result[$key]->id}})">
                <input type="submit" value="删除评论" onclick="deleteComment({{$result[$key]->id}})">
            </td>
        </tr>
        @endforeach

    </table>
</div>

@endsection