@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/custom.css" />
<link rel="stylesheet" href="{{ url('/') }}/css/normalize_1.css" />
<link rel="stylesheet" href="{{ url('/') }}/css/blogIndex.css" />
@stop


@section('content')
<div class="blog_index">
@foreach($posts as $post)
    <article class="post">
        <header class="post-header">
            <h1 class="post-title">
                {{link_to_route('post.show',$post->title,$post->idPosts)}}
            </h1>
            <div class="clearfix">
                <span class="left date">{{explode(' ',$post->created_at)[0]}}</span>
                <span class="right label">{{$post->comment_count}} comments </span>
            </div>
        </header>
        <div class="post-content">
            <p>{{$post->read_more.' ...'}}</p>
            <span>{{link_to_route('post.show','Read full article',$post->idPosts)}}
        </div>
        <footer class="post-footer">
            <hr>
        </footer>
    </article>
@endforeach
{{$posts->links()}}
</div>
@stop


    