@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/health_styles.css" />
@stop

@section('content')
   <div class="row">
   
   <div class="medium-6 large-6 columns large-centered medium-centered small-centered" id="healthlist">
       <h2>Add Medical Information</h2>
       {{ Form::open(array('action' => 'HealthController@addHealthTracker')) }}
       
       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Dog:</span>
                   <select name="idDog" class="droplist">
                   @foreach ($dogs as $dog)
                   <option value="{{ $dog->idDog }}">{{ $dog->name }}</option>
                   @endforeach
                   </select>
               </label>  
           </div>
       </div>
       <br />
       
       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Medication:</span></label>
               <input class="textbox" id="code" type="input" name="medication" />
               <?php echo $errors->first('medication'); ?>
           </div>
       </div>
       <br />
       
       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Allergies:</span></label>
               <textarea id="name" type="input" name="allergies" cols="40" rows="5"></textarea>
               <?php echo $errors->first('allergies'); ?>
           </div>
       </div>
       <br />
       
       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Food Preference:</span></label>
               <textarea id="price" type="input" name="food_preference" cols="40" rows="5"></textarea>
               <?php echo $errors->first('food_preference'); ?>
           </div>
       </div>
       <br />

       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Daily Meal:</span></label>
               <input class="textbox" id="category" type="input" name="daily_meal" />
               <?php echo $errors->first('daily_meal'); ?>
           </div>
       </div>
       <br />
       
       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Vaccine:</span></label>
               <input class="textbox" id="code" type="input" name="vaccine" />
               <?php echo $errors->first('vaccine'); ?>
           </div>
       </div>
       <br />
       
       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Disease:</span></label>
               <textarea id="disease" type="input" name="disease" cols="40" rows="5"></textarea>
               <?php echo $errors->first('disease'); ?>
           </div>
       </div>
       <br />
       
       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Surgeries:</span></label>
               <textarea id="surgeries" type="input" name="surgeries" cols="40" rows="5"></textarea>
               <?php echo $errors->first('surgeries'); ?>
           </div>
       </div>
       <br />
       
       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Vet Appointment:</span></label>
               <input class="textbox" id="vet_date" type="input" name="vet_date" />
               <?php echo $errors->first('vet_date'); ?>
           </div>
       </div>
       <br />
       
       <div class="row">
           <div class="small-12 large-centered columns">
               <label><span class="fontbold">Vet History:</span></label>
               <textarea id="vet_history" type="input" name="vet_history" cols="40" rows="5"></textarea>
               <?php echo $errors->first('vet_history'); ?>
           </div>
       </div>
       <br />
       
       <label>&nbsp;</label>
       <input class="green button [tiny small large]" type="submit" value="Add" />
       {{ Form::close() }}
   <p><a class="green button [tiny small large]" href="{{ URL::to('healthTracker') }}">View Medical Information</a></p>
   </div  
   </div>
@stop