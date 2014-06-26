<?php

class DogController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Dog Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

        public function listDogsOfAUser()
        {
            $userid = Session::get('userid');
            if ($userid=='')
            {
                return Redirect::to('/');
            }             
            $dogs = Dog::where('idUser', '=', $userid)->get();
            return View::make('listDog')->with('dogs', $dogs);            
        }

        public function addDog()
        {
            $userid = Session::get('userid');
            $name = Input::get('name');
            $breed = Input::get('breed');
            $gender = Input::get('gender');
            $DOB = Input::get('DOB');
            $weight = Input::get('weight');
            $color = Input::get('color');
            $description = Input::get('description');

            $dog = new Dog;
            $dog->idUser = $userid;
            $dog->name = $name;
            $dog->breed = $breed;
            $dog->gender = $gender;
            $dog->DOB = $DOB;
            $dog->weight = $weight;
            $dog->color = $color;
            $dog->description = $description;
            
            $dog->save();
            
            $destinationPath = public_path();
            $destinationPath = $destinationPath . DIRECTORY_SEPARATOR . 'uploadImage' . DIRECTORY_SEPARATOR . 'avatar';       
            Log::info($destinationPath);

            if (!File::exists($destinationPath))
            {
                File::makeDirectory($destinationPath);
            }

            if (Input::hasFile('dogImage'))
            {
                if (Input::file('dogImage')->isValid())
                {
                    $name = Input::file('dogImage')->getClientOriginalName();
                    
                    Input::file('dogImage')->move($destinationPath, $dog->idDog . '_' . $name);
                    $dog->picture = $dog->idDog . '_' . $name;
                    $dog->save();                    
                }
            }
        

            return Redirect::to('listDog');
         
        }
        
        public function deleteDog($dogID)
        {
            $dog = Dog::find($dogID);      
            $dog->delete();
            
            return Redirect::to('listDog');
        }

        public function editDog()
        {
            $dogID = Input::get('dogid');
            $name = Input::get('name');
            $breed = Input::get('breed');
            $gender = Input::get('gender');
            $DOB = Input::get('DOB');
            $weight = Input::get('weight');
            $color = Input::get('color');
            $description = Input::get('description');

            $dog =  Dog::find($dogID); 
            $dog->name = $name;
            $dog->breed = $breed;
            $dog->gender = $gender;
            $dog->DOB = $DOB;
            $dog->weight = $weight;
            $dog->color = $color;
            $dog->description = $description;
            
            
            $dog->save();
            
            $destinationPath = public_path();
            $destinationPath = $destinationPath . DIRECTORY_SEPARATOR . 'uploadImage' . DIRECTORY_SEPARATOR . 'avatar';       
            Log::info($destinationPath);

            if (!File::exists($destinationPath))
            {
                File::makeDirectory($destinationPath);
            }

            if (Input::hasFile('dogImage'))
            {
                if (Input::file('dogImage')->isValid())
                {
                    $name = Input::file('dogImage')->getClientOriginalName();
                    
                    Input::file('dogImage')->move($destinationPath, $dog->idDog . '_' . $name);
                }
                $dog->picture = $dog->idDog . '_' . $name;
                $dog->save();
            }
        

            
            
            return Redirect::to('listDog');
         
        }        
        
}