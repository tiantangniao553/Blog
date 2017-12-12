
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
    document.getElementById('content').value = '{{$res->content}}';
}

function cancel() {
    if( confirm('你确认取消修改吗') ){
        window.location.href = '/try';
    }
}

</script>
@endsection

@section('middle')
<div class="capacity">
<table class="table-info">
<form action={{url('modifyComment/'.$res->id)}} method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value={{$res->id}}>
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <tr>
        <td><input type="text" id="content" name="content" value={{$res->content}}></td>
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