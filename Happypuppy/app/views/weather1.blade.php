@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/weatherApp.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

@stop


    <!------ WEATHER ------->
@section('content')

            <div class="row">
                <div class="app large-6 medium-6 large-centered medium-centered small-centered columns">

                     <?php
                        $rss=simplexml_load_file('http://rss.theweathernetwork.com/weather/caon0696');

                        echo '<h2>Toronto '.$rss->channel->item->title.'</h2>';
                        echo '<h3>'.substr($rss->channel->item->pubDate,0, 16) .'</h3>';
                        echo '<h4>'.$rss->channel->item->description.'</h4>';

                        $r=$rss->channel->item->description; //aqui estoy metiendo el estring y luego lo comparo en la DB
                        //echo '<p>'.$r.'</p>';
                    ?>   
                </div>
                </div>

            <div class="row">
                 <div class="app large-6 medium-6 large-centered medium-centered small-centered columns">
                <h5>Weather Ontario Cities</h5>

                <!--form action="weather1.blade.php" method="post"-->
                    
            {{ Form::open(array('action'=>'weatherController@selectCity')) }}
                
                    
                    <select name="city">
                        <option value="Brampton">Brampton</option> 
                        <option value="Caledon">Caledon</option>
                        <option value="Etobicoke">Etobicoke</option>
                        <option value="Markham">Markham</option>
                        <option value="Mississauga">Mississauga</option>
                        <option value="Oakville">Oakville</option>
                        <option value="Oshawa">Oshawa</option>
                        <option value="Toronto">Toronto</option>
                            
                    </select>
                    
                    <input type="submit" value="Submit" >
                    <input type="button" value="Clear" onclick="reloadPage()">
                <!--/form-->    
                
                {{ Form::close() }}
                
                 </div>
                </div>
                
                   <?php 
                   if (isset($selectedcityrss))
                   {
                    echo '<div class="row">';
                    echo '<div class="app large-6 medium-6 large-centered medium-centered small-centered columns">   ' ;
                   $new_rss=simplexml_load_file($selectedcityrss);
                    echo '<h2>'.$city1. ' ' . $new_rss->channel->item->title.'</h2>';
                    echo '<h3>'.substr($new_rss->channel->item->pubDate,0, 16) .'</h3>';
                    echo '<h4>'.$new_rss->channel->item->description.'</h4>';

                    echo '</div>';
                    echo '</div>';
                   }
                    ?>

@stop


@section('scriptonbottom')
        <script>
            function reloadPage()
              {
              location.reload();
              }
        </script>
        
@stop
