<?php

class BlogController extends BaseController
{

/*
    public function __construct()
    {
        //updated: prevents re-login.
        $this->beforeFilter('guest', ['only' => ['getLogin']]);
        $this->beforeFilter('auth', ['only' => ['getLogout']]);
    }
*/
  
    public function getIndex()
    {
        $posts = Post::orderBy('idPosts', 'desc')->paginate(10);
        //$posts->getEnvironment()->setViewName('pagination::simple');
        //$this->layout->title = 'Home Page | Laravel 4 Blog';
        //$this->layout->main = View::make('home')->nest('content', 'index', compact('posts'));
        return View::make('home')->nest('content', 'blogIndex', compact('posts'));
    }
    

}
