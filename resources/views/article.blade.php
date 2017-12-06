

@extends('template.firsttry')

@section('script')
<script type="text/javascript">
    function addComment(id) {
        window.location.href="addComment/"+id;
    }
</script>
@endsection()

@section('middle')

<div class="capacity">
    <table class="table-info">
        <tr>
            <td width="125px">博主id</td>
            <td width="125px">{{$authorid}}</td>
            <td width="125px">博文id</td>
            <td width="125px">{{$id}}</td>
        </tr>
        <tr>
            <td colspan="4" readonly style="font-weight:bold">{{$title}}</td>
        </tr>
        <tr>
            <td colspan="4" readonly>{{$content}}</td>
        </tr>
        <tr>
            <input typr="button" value="发表评论" onclick="addComment({{$id}})">
        </tr>
    </table>
</div>

@endsection