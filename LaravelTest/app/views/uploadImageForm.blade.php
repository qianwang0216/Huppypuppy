@extends('master')

@section('content')

{{ Form::open(array('action' => 'testController@uploadFile', 'files' => true)) }}

<input type='file' name='dogImage' accept="image/*">
<br />
<button type='submit'>Upload</button>

{{ Form::close() }}

@stop