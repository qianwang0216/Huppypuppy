<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Appointment extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'appointment';    
        protected $primaryKey = 'idApp';
        public $timestamps = false;
        
        //connectong with Dog table
        public function dog(){
            return $this->belongsTo('Dog', 'idDog');
        }
    
}