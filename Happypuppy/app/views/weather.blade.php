@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/weather.css" />
@stop


<!------ APPOINTMENTS ------->
@section('content')

<!--//?php
Session::put('idApp', '1');
?-->
            <div class="row">
                <div class="app large-6 medium-6 large-centered medium-centered small-centered columns" ">

                     <?php
                        $rss=simplexml_load_file('http://rss.theweathernetwork.com/weather/caon0696');

                        echo '<h1>Toronto '.$rss->channel->item->title.'</h1>';
                        echo '<h3>'.substr($rss->channel->item->pubDate,0, 16) .'</h3>';
                        echo '<h4>'.$rss->channel->item->description.'</h4>';

                        $r=$rss->channel->item->description; //aqui estoy metiendo el estring y luego lo comparo en la DB
                        //echo '<p>'.$r.'</p>';
                    ?>   

            <div class="row">
                <h5>Weather Ontario Cities</h5>
                     

                <form action="weather.php" method="post">  
                    <select name="city">
                        @foreach($weather as $weather_)
                        
                            <option value="{{ $weather_->city; }}">
                                {{ $weather_->city; }}
                            </option>
                        @endforeach 
                    </select>
                    
                    <input type="submit" value="Submit" >
                </form>    
                    
                    <br> <br> <br>
                    <!--input type="button" value="Clear" onclick="reloadPage()"-->

            </div>
               
             </div>
                
                
                
    
      
        </div> 
                



@stop

