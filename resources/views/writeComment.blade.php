

@extends('template.firsttry')

@section('style')
<style type="text/css">
.comment {
    height:200px;
    width:300px;
    border-left:0;
}

</style>
@endsection
@section('middle')

<div class="capacity">
    <form action="/comment/blog/id" method="post">
        {{csrf_field()}}
        <div></div>
        <input type="text" maxlength=255 name="content" class="comment">
        <input type="hidden" name="commentedid" value={{$id}}>
        <input type="hidden" name="authorid" value={{$authorid}}>
        <input type="submit" value="提交" >
    </form>
</div>

@endsection