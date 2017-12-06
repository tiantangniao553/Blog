

@extends('template.firsttry')
@section('style')
<style type="text/css">
.upload{
    margin-left:300px;
    height:30px;
    width:500px;
    border-style:dashed;
    border-color:#af2aff;

}

</style>
@show

@section('middle')
<div class="upload">
<form action="" method="post" enctype="multipart/form-data">
    请选择文件:
    <input class="uploadfile" type="file" name="afile" required>
</form>
</div>
@endsection