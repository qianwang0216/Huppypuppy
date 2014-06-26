<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Album extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'albums';    
        
        protected $primaryKey = 'idImage';
        
        public $timestamps = false;
        
        public function dog()
        {
            return $this->belongsTo('Dog', 'idDog');
        }
    
}