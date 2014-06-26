@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/park_styles.css" />
@stop

@section('content')
<?php
//Session::put('userid', '1');
//Session::put('realname', 'Ben Mo');
?>

<div class="row">
   <div class="parkwhole small-10 medium-6 large-4 columns large-centered medium-centered small-centered">
       <!--**** DROPDOWN PARK LIST ****-->            
       <div class="app">
           <h2>Choose the park!</h2>
           <div class="parkresult">
               {{ Form::open(array('action' => 'ParkController@showParkInfo')) }}
               <select name="park_name" class="ddl">
               <?php
               foreach($parknames->Location as $mypark)
               {
                   echo '<option value="' . htmlentities($mypark->LocationName) . '">';
                   echo htmlentities($mypark->LocationName) . '</option>';
               }
               ?>
               </select>

               <input class="green button [tiny small large]" type="submit" value="Submit" name="subpark" class="btn" />
               {{ Form::close() }}
           

           <?php
           if(isset($selection)){
               echo '<div class="result">';
               echo '<p><span class="fontbold">Your Chosen Park: </span>'.$selection.'</p>';
               foreach ($parknames->Location as $mypark) {
                   if ((string)$mypark->LocationName == $selection) {
                       echo '<span class="fontbold">Location ID: </span>' . htmlentities($mypark->LocationID).'<br />';
                       echo '<span class="fontbold">Location Name: </span>' . htmlentities($mypark->LocationName).'<br />';
                       echo '<span class="fontbold">Location Address: </span>' . htmlentities($mypark->Address).'<br />';
                       if ((string)$mypark->PhoneNumber !== ""){
                           echo '<span class="fontbold">Location Phone Number: </span>' . htmlentities($mypark->PhoneNumber).'<br />';
                       }   
                   }
               }
               echo '</div>';
           }
           ?>
           </div>
       </div>
       
       <!--**** DROPDOWN LOCATION LIST ****--> 
       <div class="app">
           <h2>Pick up the location near you!</h2>
           <div class="parkresult">
               {{ Form::open(array('action' => 'ParkController@showParkLocation')) }}
               <select name="locations" class="ddllong">
               <?php
               $parks=simplexml_load_file('http://www1.toronto.ca/City_Of_Toronto/Information_Technology/Open_Data/Data_Sets/Assets/Files/locations-20110725.xml');              
               foreach($parks->Location as $mypark)
               {
                   if($mypark->Intersections->Intersection != ""){
                       echo '<option value="' . htmlentities($mypark->Intersections->Intersection) . '">';
                       echo htmlentities($mypark->Intersections->Intersection) . '</option>';
                       
                   }   
               }
               ?>
               </select>

               <input class="green button [tiny small large]" type="submit" value="Submit" name="sublocation" class="btn" />
               {{ Form::close() }}

           <?php
           if(isset($location_selection)){
               echo '<div class="result">';
               echo '<p><span class="fontbold">The Location near you: </span>'.$location_selection.'</p>';
               foreach ($parknames->Location as $mypark) {
                   if(is_object($mypark->Intersections)){
                       if ((string)$mypark->Intersections->Intersection == $location_selection){
                           echo '<span class="fontbold">Location Name: </span>' . $mypark->LocationName.'<br />';
                           echo '<span class="fontbold">Location Address: </span>' . $mypark->Address.'<br />';
                           echo '<span class="fontbold">Location Phone Number: </span>' . $mypark->PhoneNumber.'<br /><br />';
                   }                      
                   }
                   
               }
               echo '</div>';
           }
           ?>
       </div>
   </div>
       
       <!--**** DROPDOWN FACILITY LIST ****--> 
       <div class="app">
           <h2>Pick up the facilities you want!</h2>
               <div class="parkresult">
               {{ Form::open(array('action' => 'ParkController@showParkFacility')) }}
               <select name="facilities" class="ddllong">
               <?php
               foreach($parknames->Location->Facilities->Facility as $mypark)
               {
                   echo '<option value="' . htmlentities($mypark->FacilityDisplayName) . '">';
                   echo htmlentities($mypark->FacilityDisplayName) . '</option>';
               }
               ?>
               </select>

               <input class="green button [tiny small large]" type="submit" value="Submit" name="subfacility" class="btn" />
               {{ Form::close() }}

           <?php
           if(isset($facility_selection)){
               echo '<div class="result">';
               echo '<p><span class="fontbold">Your Chosen Facility: </span>'.$facility_selection.'</p>';
               foreach ($parknames->Location as $mypark) {
                   if ((string)$mypark->Facilities->Facility->FacilityDisplayName == $facility_selection){
                           echo '<span class="fontbold">Location Name: </span>' . htmlentities($mypark->LocationName).'<br />';
                           echo '<span class="fontbold">Location Address: </span>' . htmlentities($mypark->Address).'<br /><br />';
                           if ((string)$mypark->PhoneNumber !== ""){
                               echo '<span class="fontbold">Location Phone Number: </span>' . htmlentities($mypark->PhoneNumber).'<br /><br />';
                           }
                   }
               }
               echo '</div>';
           }
           ?>
           </div>
       </div>
       
       
</div>
       

@stop