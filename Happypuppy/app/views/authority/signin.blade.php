@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/authority.css" />
@stop

@section('content')
<div class="row">
    <div  class="signin large-6 medium-6 large-centered medium-centered small-centered columns">  
    {{ Form::open(array('action' => 'AuthorityController@postSignin')) }}
        <h2>User Login</h2>
        <table>
            <tr>
                <td>Username/Email: </td>
                <td><input name="email_or_name" type="text" placeholder="Email" required autofocus></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input name="password" type="password" placeholder="Password" required></td>
            </tr>
        </table>
        <label class="checkbox">
            <input type="checkbox" name="remember-me" value="1"> Remember me
        </label>
        <h3>Do not have an account? <a href="./signup">Click here to sign up </a></h3>
         <br>
         <button type="submit">Login</button>
       
    {{ Form::close() }}
    </div>
</div>
@stop