@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/custom.css" />
<link rel="stylesheet" href="{{ url('/') }}/css/normalize_1.css" />
@stop

@section('content')
<div class="show_single_comment">
    <p><b>&nbsp;</b></p>
    <p><b>Commenter:</b> {{{$comment->commenter}}}</p>
    <p><b>Email:</b> {{{$comment->email}}}</p>
    <p><b>Comment:</b></p>
    <p>{{{$comment->comment}}}</p>
    <a href="../list">Back</a>
    <a class="close-reveal-modal">&#215;</a>
</div>
@stop