
@extends('template.firsttry')

@section('script')
<script type="text/javascript">

function restore() {
    document.getElementById('title').value = '{{$res->title}}';
    document.getElementById('content').value = '{{$res->content}}';
}

function cancel() {
    if( confirm('你确认取消修改吗') ){
        window.location.href = '/try';
    }
}
</script>
@show

@section('middle')
<div class="capacity">
<table class="table-info">
<form action="" method="post">
    <tr>
        <td><input type="text" id="title" value={{$res->title}}></td>
    </tr>
    <tr>
        <td><input type="text" id="content" value={{$res->content}}></td>
    </tr>
    <tr>
        <td>
            <input type="submit" value="提交修改">
            <input type="button" value="恢复原样" onclick="restore()">
            <input type="button" value="取消修改" onclick="cancel()">
        </td>
    </tr>
</form>
</table>
</div>
@endsection