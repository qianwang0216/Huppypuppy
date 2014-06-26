@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/custom.css" />
<link rel="stylesheet" href="{{ url('/') }}/css/normalize_1.css" />
@stop

@section('content')

{{-- home page --}}

  <div class="content">
        {{$content}}
  </div>
@stop
