<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

//class Dog extends Eloquent {
//
//	protected $table = 'dogs';          
//        protected $primaryKey = 'idDog';
//        public $timestamps = false;
//    
//}

class Health extends Eloquent {

        protected $table = 'medical_info';
        protected $primaryKey = 'idMedical';
        public $timestamps = false;
        
        public function dog(){
            return $this->belongsTo('Dog', 'idDog');
        }
    
}