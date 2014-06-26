<?php

class AppController extends BaseController {
    
    public function showApp() {
        
        // ESTO ES PARA LA SESSION Y SIRVE--- $idApp = Session::get('idApp');
        // $appointDB = Appointment::where('idApp','=',$idApp)->get();
        $userid = Session::get('userid');
        if ($userid=='')
        {
            return Redirect::to('/');
        }        
//        $appointDB=Appointment::all();
        $appointDB = User::find($userid)->appointments()->orderBy('idApp')->get();  
        return View::make('appoints')->with('appoints',$appointDB);
    }
    
    public function addApp() {
        
        //$userid=seccion::get('idApp'); //user seccion
        
        //reading from the form
        
        $name = Input::get('name');
        $address = Input::get('address');
        $phone = Input::get('phone');
        $date = Input::get('date');
        $time = Input::get('time');
        $type1 = Input::get('type');
        $text = Input::get('text');
        
        $idDog = Input::get('idDog');//from Dogs table
        
        // ---- VALIDATION ----//
        
        Input::flash();   
        
        $rules = array(
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'type' => 'required',
            
         );
        
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails())
        {
            return Redirect::to('addAppForm')->withErrors($validator)->withInput();
        }
        
        
        $appointDB = new Appointment; //table object
                
        $appointDB->name=$name;
        $appointDB->address=$address;
        $appointDB->phone=$phone;
        $appointDB->date=$date;
        $appointDB->time=$time;
         $appointDB->type=$type1;
        $appointDB->text=$text;
        
        $appointDB->idDog = $idDog;
        
        $appointDB->save();
        
        return Redirect::to('appoints');
        
    }
    
     public function showEditAppForm($idApp)
        {
            $appoints = Appointment::find($idApp);
            
            //@foreach($appoints as $appoint)----- appoints.blade
            return View::make('editAppForm')->with('appoint', $appoints); 
        }
    
    public function editApp() {
                
        //reading from the form                
                
        $idApp=Input::get('idApp');
        $name=Input::get('name');
        $address=Input::get('address');
        $phone=Input::get('phone');
        $date=Input::get('date');
        $time=Input::get('time');
        $type2=Input::get('type');
        $text=Input::get('text');
        
        
        $appoint_t=  Appointment::find($idApp);
        
        $appoint_t->name=$name;
        $appoint_t->address=$address;
        $appoint_t->phone=$phone;
        $appoint_t->date=$date;
        $appoint_t->time=$time;
        $appoint_t->text=$text;
        $appoint_t->type=$type2;
        
        $appoint_t->save();
        
        return Redirect::to('appoints');
        
    }
    
  public function deleteApp() {      
      
        $appointID = Input::get('idApp');
        
        $appointDB=  Appointment::find($appointID);
        $appointDB->delete();
        
        return Redirect::to('appoints');
        
    }
}
