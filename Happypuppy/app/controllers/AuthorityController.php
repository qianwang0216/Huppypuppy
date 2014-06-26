<?php

class AuthorityController extends BaseController
{
    /**
     * Page: Sign in
     * @return Response
     */
    public function getSignin()
    {
        return View::make('authority.signin');
    }
     /**
     * Action: Sign in
     * @return Response
     */
    public function postSignin()
    {
        $email_or_name = Input::get('email_or_name');
        $flag = filter_var($email_or_name,FILTER_VALIDATE_EMAIL);
        //Check if the format belongs to email
        if($flag==TRUE){
            $flag="email";
        }
        else {
            $flag="username";
        }
        $password = Input::get('password');
        //$field=  filter_var($variable);
        // Credentials
        $credentials = array($flag=>$email_or_name, 'password'=>$password);

        Log::info(Hash::make('password'));
        // If remember the login status
        $remember  = Input::get('remember-me', 0);
        // Validate the credentials
        if (Auth::attempt($credentials, $remember)) {
            // Login successfully, redirect to the previous page
            Session::start();
            Session::put('userid', Auth::user()->idUser);
            Session::put('username',$email_or_name);   
            
            return Redirect::to('/listDog');
        } 
        else {
            // Login failed, return back
            return Redirect::back()
                ->withInput()
                ->withErrors(array('attempt' => '"email"or"password" wrong, please login again.'));
        }
    }
    
    /**
     * Page: Registration
     * @return Response
     */
    public function getSignup()
    {
        return View::make('authority.signup');
    }
    
    /**
     * Action: Registration
     * @return Response
     */
    public function postSignup()
    {
        // Get all the form data
        $data = Input::all();
        // Create validation rules
        $rules = array(
            'realname' => 'required|alpha|between:3,10|unique:users',
            'username' => 'required|alpha|between:3,10|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required|alpha_dash|between:6,16|confirmed',
            'answer' => 'required',
           'phone' => array('required','regex:"((\(\d{3}\) ?)|(\d{3}-))?\d{3}-\d{4}"'),
            'birthday' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal' => array('required','regex:"[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]"'),
            'image' => 'required',
        );
        // Customed validation rules
        $messages = array(
            'realname.required'   => 'Please input real name',
            'username.required'   => 'Please input username',
            'username.unique'     => 'The username has been used',
            'username.alpha'      => 'Please input letters',
            'username.between'    => 'Please keep the username length between 3 to 10 bits.',
            'email.required'      => 'Please input email address',
            'email.email'         => 'Please input a right email address',
            'email.unique'        => 'The email address has been used',
            'password.required'   => 'Please input password',
            'password.alpha_dash' => 'The password format was wrong',
            'password.between'    => 'Please keep the password length between 6 to 16 bits.',
            'password.confirmed'  => 'You entered two different passwords',
            'answer.required'     => 'Please input answer',
            'phone.required'      => 'Please input phone number',
            'phone.regex'         => 'Please input a right phone number format',
            'birthday.required'   => 'Please input birthday',
            'address.required'    => 'Please input address',
            'city.required'       => 'Please input city',
            'province.required'   => 'Please input province',
            'postal.required'     => 'Please input postal',
            'postal.regex'        => 'Please input a right postal code format',
            'image.required'      => 'Please input image',
        );
        // Start validation
        $validator = Validator::make($data, $rules, $messages); 
        
        if ($validator->passes()) {
            // if validate successfully, add users
            $user = new User;
            $user->realname = Input::get('realname');
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $password_tmp = Input::get('password');
            $password = Hash::make($password_tmp);
            $user->password = $password;
            //Log::info(Hash::make('password'));
            $user->question = Input::get('question');
            $user->answer = Input::get('answer');
            $user->telephone = Input::get('phone');
            $user->birthday = Input::get('birthday');
            $user->address = Input::get('address');
            $user->city = Input::get('city');
            $user->province = Input::get('province');
            $user->postalcode = Input::get('postal');
            $user->public = Input::get('public');
            $merge_address = Input::get('merge_address');
            log::info($merge_address);
            //split the address (latitude, longitude)
            
            $seperate_address = explode(',',$merge_address); 
            for($i=0;$i<count($seperate_address);$i++){
                $latitude = $seperate_address[0];
                $longitude = $seperate_address[1];
            } 
            $latitude = substr($latitude.trim($latitude), 1);
            $longitude = substr($longitude.trim($longitude), 0, -1);

            log::info($latitude);
            log::info($longitude);
            $user->latitude = $latitude;
            $user->longitude = $longitude;
            
            $file=Input::file('image');
            if(Input::hasFile('image')){
                $clientName=$file->getClientOriginalName();
                $entension=$file->getClientOriginalExtension();
                $newName=md5(date('ymdhis').$clientName).".".$entension;
                $path=$file->move(app_path().'/storage/uploads',$newName);
                $user->image = $path;
            }
               
            if ($user->save()) {
                // Add successfully
                // Jumps to the signupSuccess page, hint the user to activate
                return Redirect::to('/signin');
            } else {
                // Add failed
                return Redirect::back()
                    ->withInput()
                    ->withErrors($validator);
            }
        } else {
            // Validate failed, return back
            return Redirect::back()
                    ->withInput()
                    ->withErrors($validator);
        }
    }

    public function getLogout()
    {
        
        Auth::logout();
        Session::forget('username');
        Session::forget('userid');
        //return Redirect::to('../signin');
        return Redirect::to('/');
    }

    
}
