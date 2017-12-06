<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>my first try</title>

<style type="text/css">

h1{
    position:absolute;
    margin-left:60%;
    line-height:150px;
    color: #af2aff;
    font-style:italic;
    font-size: 45px;
    font-weight: bold;
}

.top-right-links:link{
    text-decoration:none;
}
.top-right-links{
    margin-left:75%;
    font-size:large;
    font-family: "Inconsolata", "Fira Mono", "Source Code Pro", Monaco, Consolas, "Lucida Console", monospace;
}

.login{
    height:50px;
    width:100%;
}

.head1{
    height:400px;
    width:1600px;
    background-image:url('/images/headbg.jpg');
    background-size:100% 100%;
}

.middle{
    width:1000px;
    position:relative;
    text-align:center;
}
.table-index{
    position:relative;
    padding-top:275px;
    padding-left:200px;
    width:1300px;
    height:100px;
}

.table-index td{
    width:350px;
    padding:0;
    text-align:center;
}

.table-index td a:link{
    color: #000000;
    font-size:50px;
    font-weight:900;
    text-decoration:none;
}

.table-index td a:visited{
    color: #3c0714;
    text-decoration:none;
}

.table-index td a:hover{
    color: #00cccc;
    text-decoration:none;
    font-size:60px;
    font-weight:bolder;
}

.table-index td a:link{
    color:#ff0000;
}

.table-index td a:visited{
    color:#ff0000;
}

.capacity{
    width:500px;
    margin-left:500px;
    margin-top:50px;
    background-color: #ff9f91;
}

.table-info{
    border-style:solid;
    border-width:1px;
    border-collapse:collapse;
}

.table-info tr td{
    text-align:center;
    font-size: xx-large;
    border-style:solid;
    border-width:1px;
    font-weight:500;
    margin:0;
}

.profile{
    width:200px;
    height:300px;
}

.checktext{
    width:100px;
}

</style>
@section('style')
@endsection

@section('script')
@show


</head>
<body>
<div class="login" id="login">
    @if (Route::has('login'))
        <div class="top-right-links">
            @auth
                <a href="{{ url('/try') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif
</div>
<div class="head1">
    <h1>王健宇的博客</h1>
<table class="table-index">
    <tr>
        <td><a href={{url('/try')}}>首页</a></td>
        <td><a href="/visitor/blog/u/{{Auth::id()}}" >博文</a></td>
        <td><a href={{url('select')}}>查询</a></td>
        <td><a href="#">其它</a></td>
    </tr>
</table>
</div>
<div class="middle">
    @section("middle")

    @show
</div>
<div class="foot">
</div>
</body>
</html>
