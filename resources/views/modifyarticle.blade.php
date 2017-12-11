
@extends('template.firsttry')

@section('style')
    <style type="text/css">

        .table-info tr {
            width:500px;
        }

        .table-info [type="text"]{
            width:500px;
            background-color:#ff9f91;
            border-style:hidden;
            text-align:center;
        }

        #content {
            height:100px;
        }
        #title {
            font-weight:bold;
        }
    </style>
@endsection

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

function submit() {
    var id = '{{$res->id}}';
    var form = new FormData();
    form.title = '{{$res->title}}';
    form.content = '{{$res->content}}';
    fetch('/blog'+id,{
        method:'PUT',
        body:form
    })
}
</script>
@endsection

@section('middle')
<div class="capacity">
<table class="table-info">
<form>
    {{csrf_field()}}
    <tr>
        <td><input type="text" id="title" value={{$res->title}}></td>
    </tr>
    <tr>
        <td><input type="text" id="content" value={{$res->content}}></td>
    </tr>
    <tr>
        <td>
            <input type="button" value="提交修改" onclick="submit()">
            <input type="button" value="恢复原样" onclick="restore()">
            <input type="button" value="取消修改" onclick="cancel()">
        </td>
    </tr>
</form>
</table>
</div>
@endsection