<?php

class ParkController extends BaseController {
    
    public function showParkName() {

        $parks=simplexml_load_file('http://www1.toronto.ca/City_Of_Toronto/Information_Technology/Open_Data/Data_Sets/Assets/Files/locations-20110725.xml');
              
        return View::make('park')->with('parknames', $parks);

 
    }
    public function showParkInfo() {
        $selection = Input::get('park_name');
        $parks=simplexml_load_file('http://www1.toronto.ca/City_Of_Toronto/Information_Technology/Open_Data/Data_Sets/Assets/Files/locations-20110725.xml');
              
        return View::make('park')->with(array('parknames'=> $parks, 'selection'=>$selection));

 
    }
    public function showParkFacility() {
        $facility_selection = Input::get('facilities');
        $parks=simplexml_load_file('http://www1.toronto.ca/City_Of_Toronto/Information_Technology/Open_Data/Data_Sets/Assets/Files/locations-20110725.xml');
              
        return View::make('park')->with(array('parknames'=> $parks, 'facility_selection'=>$facility_selection));

 
    }
    public function showParkLocation() {
        $location_selection = Input::get('locations');
        $parks=simplexml_load_file('http://www1.toronto.ca/City_Of_Toronto/Information_Technology/Open_Data/Data_Sets/Assets/Files/locations-20110725.xml');
              
        return View::make('park')->with(array('parknames'=> $parks, 'location_selection'=>$location_selection));

 
    }
}