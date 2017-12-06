@extends('template.firsttry')

@section('middle')
<form method="get" action="selectById">
    请输入想要查看的博文id<input class="checktext" type="text" name="id" maxlength="10">
    <input type="submit" value="查询">
</form>

<form method="get" action="selectByAuthor">
    请输入想要查看博主id<input class="checktext" type="text" name="id" maxlength="10">
    <input type="submit" value="查询">
</form>

@endsection