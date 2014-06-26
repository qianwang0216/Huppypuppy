<?php

class Post extends Eloquent
{
    
    //protected $table = 'posts';    
        
    protected $primaryKey = 'idPosts';

    protected $fillable = ['title', 'content'];

    public function comments()
    {
        return $this->hasMany('Comment', 'idPosts');
    }

    public function delete()
    {
        foreach ($this->comments as $comment) {
            $comment->delete();
        }
        return parent::delete();
    }

}
