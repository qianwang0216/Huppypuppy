<?php

class GalleryController extends BaseController {
        public function showAlbum()
        {
            $userid = Session::get('userid');
            if ($userid=='')
            {
                return Redirect::to('/');
            }             
            $dogs = Dog::where('idUser', '=', $userid)->get();
            $albums = User::find($userid)->albums()->orderBy('idImage')->get();
            $user = User::find($userid);
            return View::make('gallery')->with(array('dogs' => $dogs, 'albums' => $albums, 'user' => $user));              
        }
        
        public function uploadAlbum()
        {
//            $caption = Input::get('caption');
            $idDog = Input::get('idDog');


            
            $destinationPath = public_path();
            $destinationPath = $destinationPath . DIRECTORY_SEPARATOR . 'uploadImage' . DIRECTORY_SEPARATOR . $idDog;       
            Log::info($destinationPath);

            if (!File::exists($destinationPath))
            {
                File::makeDirectory($destinationPath);
            }

            if (Input::hasFile('dogGalleryImage'))
            {
                Log::info('Uploading');
                if (Input::file('dogGalleryImage')->isValid())
                {
                    $name = Input::file('dogGalleryImage')->getClientOriginalName();
                    $album = new Album;
                    $album->idDog = $idDog;
        //            $album->caption = $caption;

                    $album->save();                     
                    Input::file('dogGalleryImage')->move($destinationPath, $album->idImage . '_' . $name);

                    $album->imageFileName = $album->idImage . '_' . $name;

                    $fullfilename = $destinationPath . DIRECTORY_SEPARATOR . $album->idImage . '_' . $name;
                    $exif = @exif_read_data($fullfilename);
                    if (isset($exif["GPSLatitude"]) && isset($exif["GPSLongitude"]))
                    {
                        $latitude = $this->getGPS($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
                        $longitude = $this->getGPS($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
                    }
                    else
                    {
                        $userid = Session::get('userid');
                        $user = User::find($userid);
                        $latitude = $user->latitude;
                        $longitude = $user->longitude;
                    }
                    $album->latitude = $latitude;
                    $album->longitude = $longitude;
                    $album->save();

                    //return Redirect::to('gallery');

                    return Redirect::to('editAlbum/' . $album->idImage);                    
                    
                }
                else
                {
                    $errmessage = 'Invalid file.';
                    return View::make('error')->with('errmessage', $errmessage);
                }
            }
            else
            {
                $errmessage = 'Invalid file.';
                return View::make('error')->with('errmessage', $errmessage);
            }
        

         
        }            



        private function getGPS($coordinate, $hemisphere) {
          for ($i = 0; $i < 3; $i++) {
            $part = explode('/', $coordinate[$i]);
            if (count($part) == 1) {
              $coordinate[$i] = $part[0];
            } else if (count($part) == 2) {
              $coordinate[$i] = floatval($part[0])/floatval($part[1]);
            } else {
              $coordinate[$i] = 0;
            }
          }
          list($degrees, $minutes, $seconds) = $coordinate;
          $sign = ($hemisphere == 'W' || $hemisphere == 'S') ? -1 : 1;
          return $sign * ($degrees + $minutes/60 + $seconds/3600);
        }
        
        public function deleteAlbum($imageID)
        {
            $album = Album::find($imageID);      
            $album->delete();
            
            return Redirect::to('gallery');
        }

        public function editAlbum($imageID)
        {
            $album = Album::find($imageID);
            return View::make('editAlbum')->with('album', $album);
        }
        public function updateAlbum()
        {
            $caption = Input::get('caption');
            $idImage = Input::get('idImage');
            $latitude = Input::get('latitude');
            $longitude = Input::get('longitude');

            $album = Album::find($idImage);
            $album->caption = $caption;
            $album->latitude = $latitude;
            $album->longitude = $longitude;
            $album->save();
            
            return Redirect::to('gallery');
        }      
        
        public function searchFriends()
        {
            $userid = Session::get('userid');
            $user = User::find($userid);
            $distance = Input::get('distance');
            
            $deltaLong = $this->KM2LONG($distance, $user->latitude);
            $deltaLat = $this->KM2LAT($distance);
            
            $maxLong = $user->longitude + $deltaLong;
            $minLong = $user->longitude - $deltaLong;
            $maxLat = $user->latitude + $deltaLat;
            $minLat = $user->latitude - $deltaLat;
            
            $searchFriendsResult = User::where('latitude', '<=', $maxLat)
                    ->where('latitude', '>=', $minLat)
                    ->where('longitude', '<=', $maxLong)
                    ->where('longitude', '>=', $minLong)
                    ->where('idUser', '<>', $userid)
                    ->where('public', '=', 'Y')
                    ->get();
            $friends = array();
            
            foreach ($searchFriendsResult as $friend)
            {
                $dogs = Dog::where('idUser', '=', $friend->idUser)->get();
                Log::info(json_decode($dogs));
                $friends[] = array('idUser'=>$friend->idUser, 'realname'=>$friend->realname,
                    'email'=>$friend->email, 'telephone'=>$friend->telephone,
                    'address'=>$friend->address, 'city'=>$friend->city,
                    'province'=>$friend->province, 'postalcode'=>$friend->postalcode,
                    'latitude'=>$friend->latitude, 'longitude'=>$friend->longitude,
                    'dogs'=>  json_decode($dogs));
            }
            
            return Response::json($friends);
            
//            return View::make('findFriends')->with(array('user' => $user, 'searchFriendsResult' => $searchFriendsResult));            
        }

        
        private function KM2LONG($km,$l)
        {	// Returns the number of degrees of longitude equivalent to $km kilometers at latitude $l
                // Note: Assumes the earth is spherical with a circumference of 40,075.16 miles (calculation left here for clarity).
                return $km/(cos(deg2rad($l))*40075.16/360);
        }
        private function KM2LAT($km)
        {	// Returns the number of degrees of latitude equivalent to $km kilometers 
                // Note: Assumes the earth is spherical with a circumference of 40,075.16 miles (calculation left here for clarity).
                return $km/(40075.16/360);
        }        
}