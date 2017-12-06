

@extends('template.firsttry')

@section('middle')
<div class="capacity">
    <table class="table-info">
        <tr>
            <td style="width:250px;">博主id</td>
            <td style="width:250px">{{$id}}</td>
        </tr>
        <tr>
            <td>博主姓名</td><td>{{$name}}</td>
        </tr>
        <tr>
            <td style="height:300px">博主照片</td>
            <td><img class="profile" src={{$photo}} title={{$name}}
                        alter="该博主还未上传照片"></td>
        </tr>
        <tr>
            <td colspan="2">
            <form>
                <a href="/updateinfo">
                    <input type="button" onclick="window.location.href('/updateinfo')"
                           value="修改个人信息">
                </a>
            </form>
            </td>
        </tr>
    </table>
</div>
@endsection

