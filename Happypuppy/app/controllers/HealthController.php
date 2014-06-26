<?php

class HealthController extends BaseController {

    public function getHealthTracker()
    {
        //$products = DB::select('select * from products');
//        $medicalid = Session::get('medicalID');
//        log::info($medicalid);
//        $healths = Health::where('idMedical', '=', $medicalid)->get();

        $userid = Session::get('userid');
        if ($userid=='')
        {
            return Redirect::to('/');
        }         
        $healths = User::find($userid)->healths()->orderBy('idMedical')->get();       
        return View::make('healthTracker')->with('healths', $healths);

    }
 
    public function addHealthTracker()
    {
        $medication = Input::get('medication');
        $allergies = Input::get('allergies');
        $food_preference = Input::get('food_preference');
        $daily_meal = Input::get('daily_meal');
        $vaccine = Input::get('vaccine');
        $disease = Input::get('disease');
        $surgeries = Input::get('surgeries');
        $vet_date = Input::get('vet_date');
        $vet_history = Input::get('vet_history');
        
        $idDog = Input::get('idDog');
        
        Input::flash();   
        
        $rules = array(
            'medication' => 'required',
            'allergies' => 'required',
            'food_preference' => 'required',
            'daily_meal' => 'required',
            'vaccine' => 'required',
            'disease' => 'required',
            'surgeries' => 'required',
            'vet_date' => 'required',
            'vet_history' => 'required'        
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails())
        {
            return Redirect::to('addHealthTracker')->withErrors($validator)->withInput();
        }

        $health = new Health;
        $health->medication = $medication;
        $health->allergies = $allergies;
        $health->food_preference = $food_preference;
        $health->daily_meal = $daily_meal;
        $health->vaccine = $vaccine;
        $health->disease = $disease;
        $health->surgeries = $surgeries;
        $health->vet_date = $vet_date;
        $health->vet_history = $vet_history;
        $health->idDog = $idDog;

        $health->save();

        return Redirect::to('healthTracker');

    }
    
    public function showHealthTracker($medicalID)
    {
        $healths = Health::find($medicalID);      
        return View::make('editHealthTracker')->with('health', $healths); 
    }
    
    public function deleteHealthTracker()
    {
        $medicalID = Input::get('medicalID');
        $health = Health::find($medicalID);      
        $health->delete();

        return Redirect::to('healthTracker');
    }
    
    public function editHealthTracker()
    {
        $medicalid = Input::get('healthID');
        $medication = Input::get('medication');
        $allergies = Input::get('allergies');
        $food_preference = Input::get('food_preference');
        $daily_meal = Input::get('daily_meal');
        $vaccine = Input::get('vaccine');
        $disease = Input::get('disease');
        $surgeries = Input::get('surgeries');
        $vet_date = Input::get('vet_date');
        $vet_history = Input::get('vet_history');

        $health = Health::find($medicalid); 
        $health->medication = $medication;
        $health->allergies = $allergies;
        $health->food_preference = $food_preference;
        $health->daily_meal = $daily_meal;
        $health->vaccine = $vaccine;
        $health->disease = $disease;
        $health->surgeries = $surgeries;
        $health->vet_date = $vet_date;
        $health->vet_history = $vet_history;

        $health->save();

        return Redirect::to('healthTracker');

    }

}
