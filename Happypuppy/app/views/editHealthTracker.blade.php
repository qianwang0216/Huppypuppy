@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/health_styles.css" />
@stop

@section('content')
    <div class="row">
        <h2 class="rainbowhead medium-6 large-6 large-centered medium-centered small-centered columns">Edit Medical Information for {{ $health->dog->name }} </h2>
        <div id="healthlist" class="medium-6 large-6 large-centered medium-centered small-centered columns">
            {{ Form::open(array('action' => 'HealthController@editHealthTracker')) }}
            <div class="row">
                <div class="small-12 large-centered columns">
                    <label><span class="fontbold">Medication:</span></label>
                    <input id="medication" type="input" name="medication" value="{{ $health->medication }}" />
                </div>
            </div>
            <br />
            
            <div class="row">
                <div class="small-12 large-centered columns">
                    <label><span class="fontbold">Allergies:</span></label>
                    <textarea class="fontblack" id="allergies" type="input" name="allergies" cols="40" rows="5">{{ $health->allergies }}</textarea>
                </div>
            </div>
            <br />
            
            <div class="row">
                <div class="small-12 large-centered columns">
                    <label><span class="fontbold">Food Preference:</span></label>
                    <textarea class="fontblack"  id="allergies" type="input" name="food_preference" cols="40" rows="5">{{ $health->food_preference }}</textarea>
                </div>
            </div>
            <br />
            
            <div class="row">
                <div class="small-12 large-centered columns">
                    <label><span class="fontbold">Daily Meal:</span></label>
                    <input id="category" type="input" name="daily_meal" value="{{ $health->daily_meal }}" />
                </div>
            </div>
            <br />
            
            <div class="row">
                <div class="small-12 large-centered columns">
                    <label><span class="fontbold">Vaccine:</span></label>
                    <input id="vaccine" type="input" name="vaccine" value="{{ $health->vaccine }}" />
                </div>
            </div>
            <br />
            
            <div class="row">
                <div class="small-12 large-centered columns">
                    <label><span class="fontbold">Disease:</span></label>
                    <textarea id="disease" type="input" name="disease" cols="40" rows="5">{{ $health->disease }}</textarea>
                </div>
            </div>
            <br />
            
            <div class="row">
                <div class="small-12 large-centered columns">
                    <label><span class="fontbold">Surgeries:</span></label>
                    <textarea id="surgeries" type="input" name="surgeries" cols="40" rows="5">{{ $health->surgeries }}</textarea>
                </div>
            </div>
            <br />
            
            <div class="row">
                <div class="small-12 large-centered columns">
                    <label><span class="fontbold">Vet Appointment:</span></label>
                    <input id="appointment" type="input" name="vet_date" value="{{ $health->vet_date }}" />
                </div>
            </div>
            <br />
            
            <div class="row">
                <div class="small-12 large-centered columns">
                    <label><span class="fontbold">Vet History:</span></label>
                    <textarea id="vet_history" type="input" name="vet_history" cols="40" rows="5">{{ $health->vet_history }}</textarea>
                </div>
            </div>
            <br />

            <input type="hidden" name="healthID" value="{{ $health->idMedical }}" />
            <br />
            <label>&nbsp;</label>
            <input class="green button [tiny small large]" type="submit" value="Save" />
            <br />
            {{ Form::close() }}
            <p><a class="green button [tiny small large]" href="{{ URL::to('healthTracker') }}">Return to Medical Information</a></p>
        </div>
    </div>
@stop