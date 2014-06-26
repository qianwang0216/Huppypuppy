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

    <!-- display a table of products -->
    <h2>Medical Information</h2>
    <table>
        <tr>
            <th>Dog Name</th>
            <th>Medication</th>
            <th>Allergies</th>
            <th>Food Preference</th>
            <th>Daily Meal</th>
            <th>Vaccine</th>
            <th>Disease</th>
            <th>Surgeries</th>
            <th>Vet Appointment</th>
            <th>Vet History</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        @foreach ($healths as $health)
        <tr>
            <td>{{ $health->dog->name; }}</td>
            <td>{{ $health->medication; }}</td>
            <td>{{ $health->allergies; }}</td>
            <td>{{ $health->food_preference; }}</td>
            <td>{{ $health->daily_meal; }}</td>
            <td>{{ $health->vaccine; }}</td>
            <td>{{ $health->disease; }}</td>
            <td>{{ $health->surgeries; }}</td>
            <td>{{ $health->vet_date; }}</td>
            <td>{{ $health->vet_history; }}</td>
            <td><a href="{{ url('editHealthTracker', array($health->idMedical)) }}">Edit</a></td>

            <td><a href="{{ URL::to('addHealthTracker') }}">Add Product</a></td>
            <td>
                {{ Form::open(array('action' => 'HealthController@deleteHealthTracker')) }}
                    <input type="hidden" name="medicalID" value="{{ $health->idMedical; }}" />
                    <input type="submit" value="Delete" />
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </table>
<!--    <p><a href="{{ URL::to('addHealthTracker') }}">Add Product</a></p>-->
</div> 
    @stop
</div>