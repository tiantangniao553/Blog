

@extends('template.firsttry')

@section('middle')

<div class="capacity">
    <form action="/blog" method="post">
        <input type="text" maxlength=255 name="content" height=300px>
        <input type="hidden" name="id" value={{$authorid}}>
        <input type="submit" value="提交" >
    </form>
</div>

@endsection