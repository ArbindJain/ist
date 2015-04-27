<?php

# CSRF Protection
Route::when('*', 'csrf', ['POST', 'PUT', 'PATCH', 'DELETE']);

# Static Pages. Redirecting admin so admin cannot access these pages.
Route::group(['before' => 'redirectAdmin'], function()
{
	Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
	Route::get('user/{name}', array('as'=> 'user','uses'=> 'PagesController@getprofile'));
	Route::get('real/{id}', array('as'=> 'real','uses'=> 'PagesController@getalbum_pictures'));
	Route::get('/about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
	Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
	Route::Post('followuser', ['as' => 'followuser', 'uses' => 'FollowersController@follow']);
	Route::Post('unfollowuser',['as' => 'unfollowuser','uses' =>'FollowersController@unfollow']);
	Route::resource('likes', 'LikeController');
	Route::Post('diminish',['as'=>'diminish','uses'=> 'LikeController@gotohell']);
	Route::resource('connec','ProconnectorController');
	Route::resource('comments', 'CommentsController');

});

# Registration
Route::group(['before' => 'guest'], function()
{
	Route::get('/register', 'RegistrationController@create');
	Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
});

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create'])->before('guest');
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::group(['before' => 'guest'], function()
{
	Route::get('forgot_password', 'RemindersController@getRemind');
	Route::post('forgot_password','RemindersController@postRemind');
	Route::get('reset_password/{token}', 'RemindersController@getReset');
	Route::post('reset_password/{token}', 'RemindersController@postReset');
});


# Standard User Routes
Route::group(['before' => 'auth|standardUser'], function()
{
	Route::get('userProtected', 'StandardUserController@getUserProtected');
	Route::get('userProtecte/{id}', array('as'=> 'userProtecte','uses'=> 'StandardUserController@getUserProtecte'));
	Route::resource('profiles', 'UsersController', ['only' => ['show', 'edit', 'update']]);
	Route::resource('about', 'ProfilesController');
	Route::resource('imagegallery', 'PicturesController');
	Route::resource('album', 'AlbumsController');
	Route::resource('videogallery', 'VideosController');
	Route::resource('blog', 'BlogsController');
	Route::resource('audiogallery', 'AudiosController');
	Route::resource('promoter','PromotersController');
	Route::resource('events','PromotereventsController');
	Route::resource('scout','ScoutController');
	Route::resource('scoutpublishedapply','ScoutapplyController');
	Route::get('scoutpublished/{id}', array('as'=> 'scoutpublished','uses'=> 'ScoutController@getscout'));
	Route::resource('audiencereviews','AudiencereviewsController');
	Route::resource('userperformances','PerformanceController');
	Route::resource('userfeeds','FeedsController');
	Route::resource('newsfeeds','NewsfeedsController');
	//Route::resource('group','CategoriesController');

	Route::get('categories_type/{name}', array('as'=> 'group','uses'=> 'CategoriesController@index'));
	
	Route::resource('achievements','AchievementController');
	



});

# Admin Routes
Route::group(['before' => 'auth|admin'], function()
{
	Route::get('/admin', ['as' => 'admin_dashboard', 'uses' => 'AdminController@getHome']);
    Route::resource('admin/profiles', 'AdminUsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);

});


