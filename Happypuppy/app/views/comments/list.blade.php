@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/custom.css" />
<link rel="stylesheet" href="{{ url('/') }}/css/normalize_1.css" />
@stop

@section('content')

<h2 class="comment-listings">Comment listings</h2><hr>
<table>
    <thead>
    <tr>
        <th>Commenter</th>
        <th>Email</th>
        <th>At Post</th>
        <th>Delete</th>
        <th>View</th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
    <tr>
        <td>{{{$comment->commenter}}}</td>
        <td>{{{$comment->email}}}</td>
        <td>{{$comment->post->title}}</td>
        <!--var_dump({{$comment->post->title}});-->
        <td>{{HTML::linkRoute('comment.delete','Delete',$comment->idComments)}}</td>
        <td>{{HTML::linkRoute('comment.show','Quick View',$comment->idComments,['data-reveal-id'=>'comment-show','data-reveal-ajax'=>'true'])}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
{{$comments->links()}}

@stop