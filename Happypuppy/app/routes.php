<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'AuthorityController@getSignin');

Route::get('listDog', 'DogController@listDogsOfAUser');
Route::post('addDog', 'DogController@addDog');
Route::get('deleteDog/{id}', 'DogController@deleteDog');
Route::post('editDog', 'DogController@editDog');
Route::get('gallery', 'GalleryController@showAlbum');
Route::post('uploadAlbum', 'GalleryController@uploadAlbum');
Route::get('welcome', 'welcomeController@welcome');
Route::get('deleteAlbum/{id}', 'GalleryController@deleteAlbum');
Route::get('editAlbum/{id}', 'GalleryController@editAlbum');
Route::post('updateAlbum', 'GalleryController@updateAlbum');

Route::get('findFriends', function () {
   
    $userid = Session::get('userid');
    if ($userid=='')
    {
        return Redirect::to('/');
    } 
    $user = User::find($userid);    
    return View::make('findFriends')->with('user', $user);
});
Route::post('searchFriends', 'GalleryController@searchFriends');

/************** HealthTracker *******************/
Route::get('healthTracker', 'HealthController@getHealthTracker');
Route::post('healthTracker', 'HealthController@getHealthTracker');
Route::post('deleteHealthTracker', 'HealthController@deleteHealthTracker');
Route::get('addHealthTracker', function () 
{
    $userid = Session::get('userid');
    $dogs = Dog::where('idUser', '=', $userid)->get();
    return View::make('addHealthTracker')->with('dogs', $dogs);
});
Route::post('addHealthTracker', 'HealthController@addHealthTracker');
Route::get('editHealthTracker/{id}', 'HealthController@showHealthTracker');
Route::post('editHealthTracker', 'HealthController@editHealthTracker');



// ----- APPOINTMENTS ROUTES  -----



Route::get('appoints', 'AppController@showApp');
Route::post('deleteApp', 'AppController@deleteApp');
Route::post('addApp', 'AppController@addApp');
Route::get('showEditAppForm/{id}', 'AppController@showEditAppForm');
Route::post('editApp', 'AppController@editApp');



Route::get('addAppForm', function () 
{

    $userid = Session::get('userid');
    $dogs = Dog::where('idUser', '=', $userid)->get();
    return View::make('addAppForm')->with('dogs', $dogs);
});

//Route::post('addAppForm', 'AppController@addApp');

// ---- WEATHER ROUTES -----
Route::get('weather', function()
{
    return View::make('weather');
});

Route::get('weather', 'weatherController@showWeather');

Route::post('weather1', 'weatherController@selectCity');

Route::get('weather1', function()
{
    return View::make('weather1');
});

Route::get('park', 'ParkController@showParkName');
Route::post('parkInfo', 'ParkController@showParkInfo');
Route::post('ParkFacility', 'ParkController@showParkFacility');
Route::post('ParkLocation', 'ParkController@showParkLocation');

# Sign in
Route::get('signin','AuthorityController@getSignin');
Route::post('checkSignin','AuthorityController@postSignin');

# Logout
Route::get('logout','AuthorityController@getLogout');

# Sign up
Route::get( 'signup', 'AuthorityController@getSignup');
Route::post( 'postSignup', 'AuthorityController@postSignup');

# Blog

/* Model Bindings */
Route::model('post', 'Post');
Route::model('comment', 'Comment');

/* User routes */
Route::get('/post/{post}/show', ['as' => 'post.show', 'uses' => 'PostController@showPost']);
Route::post('/post/{post}/comment', ['as' => 'comment.new', 'uses' => 'CommentController@newComment']);

/* Admin routes */

/*get routes*/
Route::get('dash-board', function () {
    //$layout = View::make('master');
    //$layout->title = 'DashBoard';
    //$layout->main = View::make('dash')->with('content', 'Hi admin, Welcome to Dashboard!');
    return View::make('dash')->with('content', 'Hi admin, Welcome to Dashboard!');
});

Route::get('/post/list', ['as' => 'post.list', 'uses' => 'PostController@listPost']);
Route::get('/post/new', ['as' => 'post.new', 'uses' => 'PostController@newPost']);
Route::get('/post/{post}/edit', ['as' => 'post.edit', 'uses' => 'PostController@editPost']);
Route::get('/post/{post}/delete', ['as' => 'post.delete', 'uses' => 'PostController@deletePost']);
Route::get('/comment/list', ['as' => 'comment.list', 'uses' => 'CommentController@listComment']);
Route::get('/comment/{comment}/show', ['as' => 'comment.show', 'uses' => 'CommentController@showComment']);
Route::get('/comment/{comment}/delete', ['as' => 'comment.delete', 'uses' => 'CommentController@deleteComment']);

/*post routes*/
Route::post('/post/save', ['as' => 'post.save', 'uses' => 'PostController@savePost']);
Route::post('/post/{post}/update', ['as' => 'post.update', 'uses' => 'PostController@updatePost']);
Route::post('/comment/{comment}/update', ['as' => 'comment.update', 'uses' => 'CommentController@updateComment']);


/* Home routes */
Route::controller('blog', 'BlogController');

/* View Composer */
View::composer('dash', function ($view) {
    $view->recentPosts = Post::orderBy('idPosts', 'desc')->take(5)->get();
});



