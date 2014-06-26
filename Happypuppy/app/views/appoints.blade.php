@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/dogApp.css" />
@stop


<!------ APPOINTMENTS ------->
@section('content')

<!--//?php
Session::put('idApp', '1');
?-->

    <div class="row">     
            @foreach($appoints as $appoint)

            <div class="app large-6 medium-6 large-centered medium-centered small-centered columns" data-id="{{ $appoint->idApp; }}">

                <h2>Appointments for Dog:{{ $appoint->dog->name; }}</h2>
                <h3 class="line">Meeting with: <span class="green1"> {{ $appoint->name; }}</span></h3>
                <h3>Address: <span class="green1">  {{ $appoint->address; }}</span></h3>
                <h3>Phone: <span class="green1">  {{ $appoint->phone; }}</span></h3>
                <h3>Date: <span class="green1">  {{ $appoint->date; }}</span></h3>
                <h3>Time: <span class="green1">  {{ $appoint->time; }}</span></h3>
                <h3>Appointment type:<span class="green1">  {{ $appoint->type; }}</span></h3>
                <h3>Comments:<br /><span class="green1">  {{ $appoint->text; }} </span></h3>
                
<!------- FORM BUTTONS ---------->

                <br /> <br />
                <a href="{{ URL('showEditAppForm',array($appoint->idApp)) }}" class="green button [tiny small large]"> 
                    Edit appointment</a>
                
                <br /> <br />
                
                {{ Form::open(array('action'=>'AppController@deleteApp')) }}
                <input type="hidden" name="idApp" value="{{ $appoint->idApp; }}"/>
                <input type="submit" value="Delete"/>
                {{ Form::close() }}
                    
            </div>
            @endforeach            
     </div>
          
<br />
                <div class="row">
                    <div class="app large-6 medium-6 large-centered medium-centered small-centered columns">

                        <a href="{{ URL::to('addAppForm') }}" class="green button [tiny small large]"> 
                            New Appointment</a>

                    </div>
                </div>
                <br /> <br />

@stop

