@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/health_styles.css" />
@stop

@section('content')
<?php
//Session::put('userid', '1');
//Session::put('realname', 'Ben Mo');
//Session::put('medicalID', '1');
?>

<div class="row">
    <!-- display health information -->   
    @foreach ($healths as $health)
    <h2 class="rainbowhead medium-6 large-4 large-centered medium-centered small-centered columns">Medical Information for {{ $health->dog->name; }}</h2>
    <div class="medium-6 large-4 columns large-centered medium-centered small-centered" id="healthlist">
<!--        <div class="dogmedical">-->
            <p><span class="fontbold">Medication:</span> {{ $health->medication; }}</p>
            <p><span class="fontbold">Allergies:</span> {{ $health->allergies; }}</p>
            <p><span class="fontbold">Food Preference:</span> {{ $health->food_preference; }}</p>
            <p><span class="fontbold">Daily Meal:</span> {{ $health->daily_meal; }}</p>
            <p><span class="fontbold">Vaccine:</span> {{ $health->vaccine; }}</p>
            <p><span class="fontbold">Disease:</span> {{ $health->disease; }}</p>
            <p><span class="fontbold">Surgeries:</span> {{ $health->surgeries; }}</p>
            <p><span class="fontbold">Vet Appointment:</span> {{ $health->vet_date; }}</p>
            <p><span class="fontbold">Vet History:</span> {{ $health->vet_history; }}</p>
            <a class="green button [tiny small large]" href="{{ url('editHealthTracker', array($health->idMedical)) }}">Edit</a>

            {{ Form::open(array('action' => 'HealthController@deleteHealthTracker')) }}
                <input type="hidden" name="medicalID" value="{{ $health->idMedical; }}" />
                <input class="green button [tiny small large]" type="submit" value="Delete" />
            {{ Form::close() }}
<!--            <hr class="transparent">-->
            
<!--        </div>       -->
    </div>
    @endforeach
</div>

<br />
                <div class="row">
                    <div class="app large-4 medium-6 large-centered medium-centered small-centered columns" id="healthlist">
                        <a class="green button [tiny small large]" href="{{ URL::to('addHealthTracker') }}">Add Medical Information</a>
                    </div>
                </div>
                <br /> <br />

@stop
