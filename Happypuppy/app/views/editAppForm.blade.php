@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/dogApp.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
@stop


<!------ APPOINTMENTS ------->
@section('content')


    <div class="row">  
        <div class="app large-6 medium-6 large-centered medium-centered small-centered columns"> 
            
            <h2> Editting appointmet with:  {{ $appoint->name }}</h2>
              
            {{ Form::open(array('action'=>'AppController@editApp')) }}
                      <div class="row">
                        <div class="small-12 large-centered columns">
                          <label>Meeting with:</label>
                            <input type="text" placeholder="Appointment name" name="name"  value="{{ $appoint->name }}" />
                          
                        </div>
                      </div> 
            
                      
                      <div class="row">
                        <div class="small-12 large-centered columns">
                          <label>Comments:</label>
                          <textarea type="text" cols="40" rows="5" name="text">
                              {{ $appoint->text }}
                          </textarea>
                            
                        </div>
                      </div>


                    <div class="row">
                        <div class="small-12 large-centered columns">
                          <label>Appointment Address:</label>
                            <input type="text" placeholder="Appointment Address" name="address" value="{{ $appoint->address }}" />
                          
                        </div>
                      </div> 

                    <div class="row">
                        <div class="small-12 large-centered columns">
                          <label>Appointment Phone:</label>
                            <input type="text" placeholder="1112223333" name="phone" value="{{ $appoint->phone }}"  />
                          
                        </div>
                      </div> 
            

                          <div class="row">
                        <div class="small-12 large-centered columns">
                            <ul class="small-block-grid-2">
                                <!--li>
                                    <label>Appointment Time:</label>
                                    <input type="time" placeholder="1112223333" name="time" value="{{ $appoint->time }}" />
                                    
                                </li-->
                                
                                <li>
                                    <label>Appointment Time:</label>
                                    <input id="basicExample" type="text" name="time" />

                                    <script>
                                        $(function() {
                                        $('#basicExample').timepicker();
                                        });
                                    </script>
                                    
                                </li>

                                <li>
                                  <label>Appointment Date:</label>
                                  <input type="date" placeholder="" name="date" value="{{ $appoint->date }}" />
                                  
                                </li>
                            </ul>                
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
                  
                   <br />
                   <input type="hidden" name="idApp" value="{{ $appoint->idApp }}"/>
                   <input type="submit" value="Edit Appointment"/>
                              
           {{ Form::close() }}
           
           <br /><br />
           <a href="{{ URL::to('appoints') }}" class="green button [tiny small large]">Show Appointments</a>
            
        </div>
        </div>
        
  @stop
  
@section('scriptonbottom')
    <script src="{{ url('/') }}/js/jquery.timepicker.js" ></script>
    <script src="{{ url('/') }}/js/jquery.timepicker.min.js" ></script>
@stop