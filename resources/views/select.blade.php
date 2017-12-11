@extends('template.firsttry')

@section('script')
<script type="text/javascript">

function selectById(){
    window.location.href = 'visitor/blog/' + document.getElementById('bowenid').value;
}

function selectAuthorInfo() {
    window.location.href = 'visitor/u/' + document.getElementById('bozhuid').value;
}

function selectByAuthor() {
    window.location.href = 'visitor/blog/u/' + document.getElementById('bozhuid2').value;
}
</script>
@endsection

@section('middle')
<div class="query">
    请输入想要查看的博文id<input class="checktext" type="text" id="bowenid" maxlength="10">
    <input type="button" value="查询" onclick="selectById()">
</div>
<div class="query">
    请输入想要查看信息的博主id<input class="checktext" type="text" id="bozhuid" maxlength="10">
    <input type="button" value="查询" onclick="selectAuthorInfo()">
</div>
<div class="query">
    请输入想要查看全部博文的博主id<input class="checktext" type="text" id="bozhuid2" maxlength="10">
    <input type="button" value="查询" onclick="selectByAuthor()">
</div>
@endsection