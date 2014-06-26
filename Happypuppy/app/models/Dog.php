<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Dog extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dogs';    
        
        protected $primaryKey = 'idDog';
        
        public $timestamps = false;
        
        public function albums()
        {
            return $this->hasMany('Album');
        }
        
        public function user()
        {
            return $this->belongsTo('User', 'idUser');
        }
            
    
}