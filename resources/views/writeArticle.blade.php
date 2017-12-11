

@extends('template.firsttry')

@section('style')
<style type="text/css">
.content {
    height:300px;
    width:500px;
    background-color: #9cdaff;
}
.c1 {
    height:40px;
    font-weight:bold;
    text-align:center;
    width:100px;
}

</style>
@endsection

@section('middle')

<table class="capacity">
<form action="/blog" method="post">
    {{ csrf_field() }}
    <tr>
        <td class="c1">标题</td>
        <td><input style="width:300px;" type="text" maxlength="32" name="title" required></td>
    </tr>
    <tr>
        <td colspan="2" class="content">
        <input type="text" maxlength=255 name="content" class="content" required></td>
    </tr>
    <tr>
        <td>
            <input type="hidden" name="id" value={{$authorid}}>
            <input type="submit" value="提交" >
        </td>
    </tr>
</form>
</table>

@endsection