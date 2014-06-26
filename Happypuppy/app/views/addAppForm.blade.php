@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/dogApp.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

@stop

<!------ APPOINTMENTS ------->
@section('content')


    <div class="row">  
        <div class="app large-6 medium-6 large-centered medium-centered small-centered columns">        
            <h2> New Appointment Dog:</h2>
            
            {{ Form::open(array('action'=>'AppController@addApp')) }}
            
            
                    <div class="row">
                        <div class="small-12 large-centered columns">
                            <label></label>
                            <select name="idDog">
                            @foreach ($dogs as $dog)
                            <option value="{{ $dog->idDog }}">{{ $dog->name }}</option>
                            @endforeach
                            </select>
                       </div>
                    </div>
                <br />      
                
                      <div class="row">
                        <div class="small-12 large-centered columns">
                          <label>Meeting with:</label>
                            <input type="text" placeholder="Appointment name" name="name" />
                            <?php echo $errors->first('name'); ?>
                          
                        </div>
                      </div> 
            
                      <div class="row">
                        <div class="small-12 large-centered columns">
                             <label>Comments:</label>
                          <textarea type="text" cols="40" rows="5" name="text" placeholder="Comments">                         
                          </textarea>                        
                        </div>
                      </div>


                    <div class="row">
                        <div class="small-12 large-centered columns">
                          <label>Appointment Address:</label>
                            <input type="text" placeholder="Appointment Address" name="address" />
                          <?php echo $errors->first('address'); ?>
                        </div>
                      </div> 

                    <div class="row">
                        <div class="small-12 large-centered columns">
                          <label>Appointment Phone:</label>
                            <input type="text" placeholder="1112223333" name="phone" />
                          <?php echo $errors->first('phone'); ?>
                        </div>
                      </div> 
                
                    
                      <div class="row">
                        <div class="small-12 large-centered columns">
                          <label>Appointment Type:</label><br/>
                          <input type="radio" name="type" value="Veterinarian‎" id="Vet">
                          <label for="Veterinarian‎">Veterinarian‎</label>
                          <?php echo $errors->first('type'); ?>
                          
                          <input type="radio" name="type" value="Beauty Salon" id="Beauty">
                          <label for="Beauty Salon">Beauty Salon</label>
                          <?php echo $errors->first('type'); ?>
                          
                          <input type="radio" name="type" value="Friend" id="Friend">
                          <label for="Friend">Friend</label>
                          <?php echo $errors->first('type'); ?>
                        </div>
                      </div> 


                          <div class="row">
                        <div class="small-12 large-centered columns">
                            <ul class="small-block-grid-2">
<!--                                <li>
                                    <label>Appointment Time:</label>
                                    <input type="time" placeholder="1112223333" name="time" />
                                    </?php echo $errors->first('time'); ?>
                                </li>-->

                                <li>
                                    <label>Appointment Time:</label>
                                    <input id="basicExample" type="text" name="time" />
                                    <?php echo $errors->first('time'); ?>

                                    <script>
                                        $(function() {
                                        $('#basicExample').timepicker();
                                        });
                                    </script>
                                    
                                </li>

                                <li>
                                  <label>Appointment Date:</label>
                                  <input type="date" placeholder="" name="date" />
                                  <?php echo $errors->first('date'); ?>
                                </li>
                            </ul>                
                      </div> 
                    
                      <div class="row">
                        <div class="small-12 large-centered columns">
                            <input type="submit" value="Add an Appointment"/>
                        </div>
                      </div>
                                  
           {{ Form::close() }}
           
           
           <a href="{{ URL::to('appoints') }}" class="green button [tiny small large]">Show Appointments</a>
            
        </div>
        </div>
        
  @stop
  
@section('scriptonbottom')
    <script src="{{ url('/') }}/js/jquery.timepicker.js" ></script>
    <script src="{{ url('/') }}/js/jquery.timepicker.min.js" ></script>
@stop