@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/custom.css" />
<link rel="stylesheet" href="{{ url('/') }}/css/normalize_1.css" />
@stop

@section('content')
<h2 class="post-listings">Post listings</h2><hr>
<table>
    <thead>
    <tr>
        <th width="300">Post Title</th>
        <th width="120">Post Edit</th>
        <th width="120">Post Delete</th>
        <th width="120">Post View</th>
    </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{HTML::linkRoute('post.edit','Edit',$post->idPosts)}}</td>
                <td>{{HTML::linkRoute('post.delete','Delete',$post->idPosts)}}</td>
                <td>{{HTML::linkRoute('post.show','View',$post->idPosts,['target'=>'_blank'])}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$posts->links()}}

@stop