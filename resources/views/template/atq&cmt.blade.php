<!DOCTYPE html>

<html>
<head>

<meta charset="utf-8">

<title>博文</title>

<style>

.mainbody{
    margin-left:20%;
    margin-top:100px;
    width:60%;
}

.content{

}

.article{
    position:relative;
    margin-left:5%;
    width:50%;
}

.information{
    position:relative;
    height:100px;
    margin-left:5%;
    width:50%;
}

.a123{
    color:#00ff00;
    font-size:30px;
}
</style>

<script>

</script>

</head>
<body>
</body>

<div class="mainbody">
    <form class="content" id="content">
        <div class="information">
            博主id：@yield('authorid')
        </div>
        <div class="article">
            @section('information')
            @show
            {{--text area 里面要放纯文本的，你放什么都会被当成文字--}}
            <textarea name="article" readonly class="a123">
            @section('content')
                @show
            </textarea>
        </div>
    </form>
</div>
</html>