<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 
        //function () {return view('blog.index');}
        ['uses'=>'BlogController@index','as'=>'blog']
);


Route::get('/blog/{post}', 
        //function () {return view('blog.show');}
        ['uses'=>'BlogController@show', 'as'=>'blog.show']
);

Route::get('/category/{category}', 
        //function () {return view('blog.show');}
        ['uses'=>'BlogController@category', 'as'=>'category']
);
