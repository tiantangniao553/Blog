

@extends('template.firsttry')

@section('script')
<script type="text/javascript">

function restore(){
    element = window.getElementById('name');
    element.value = {{$name}};
}

function cancel(){
    if(confirm("确认取消修改吗")){
        location.href("");
    }
}

</script>
@show
@section('middle')
<div class="capacity">
    <form action="" method="post" enctype="multipart/form-data">
    <table class="table-info">
        <tr>
            <td style="width:200px;">博主姓名</td>
            <td style="width:230px;"><input type="text" id="name" value={{$name}}></td>
            <td><input type="button" onclick="restore()" value="恢复原姓名"></td>
        </tr>
        <tr>
            <td>博主照片</td>
            <td colspan="2"><input type="file" name="afile"></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" value="确认修改">
                <input type="button" value="取消修改" onclick="cancel()">
            </td>
        </tr>
    </table>
    </form>
</div>
@endsection

