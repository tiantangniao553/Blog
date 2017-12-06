

@extends('template.firsttry')

@section('middle')
<div class="capacity">
    <form>
    <table class="table-info">
        <tr>
            <td style="width:200px;">博主id</td>
            <td><input type="text" value={{$id}}></td>
        </tr>
        <tr>
            <td>博主姓名</td>
            <td><input type="text" value={{$name}}></td>
        </tr>
        <tr>
            <td style="height:300px">博主照片</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="确认修改"></td>
        </tr>
    </table>
    </form>
</div>
@endsection

