<?php

class weatherController extends BaseController {
    
    public function showWeather() {
        
        // ESTO ES PARA LA SESSION Y SIRVE--- $idApp = Session::get('idApp');
        // $appointDB = Appointment::where('idApp','=',$idApp)->get();
        
        $weather = Weather::all();
        return View::make('weather')->with('weather',$weather);
    }
    
    
    public function selectCity() {
        
         $city=Input::get('city');
         
         switch ($city) {
                case 'Brampton':
                    
                    $rss='http://past.theweathernetwork.com/weather/caon0080';
                    break;
                
                case 'Caledon':
                    $rss='http://rss.theweathernetwork.com/weather/caon0103';
                    break;
                
                case 'Etobicoke':
                    $rss='http://rss.theweathernetwork.com/weather/caon0230';
                    break;
                
                case 'Markham':
                    $rss='http://rss.theweathernetwork.com/weather/caon0409';
                    break;
                
                case 'Mississauga':
                   $rss='http://rss.theweathernetwork.com/weather/caon0441';
                    break;
                
                case 'Oakville':
                   $rss='http://rss.theweathernetwork.com/weather/caon0493';
                    break;
                
                case 'Oshawa':
                    $rss='http://rss.theweathernetwork.com/weather/caon0511';
                    break;
                
                case 'Toronto':
                    $rss='http://rss.theweathernetwork.com/weather/caon0696';
                    break;
            }
       
        return View::make('weather1')->with(array('selectedcityrss'=>$rss, 'city1'=>$city));
    }
    
    
   
}
