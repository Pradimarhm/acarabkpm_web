<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('foo',function(){
    return 'hello world';
});

Route::get('user/{id}',function($id){
    return 'User'.$id;
});

Route::get('posts/{post}/comments/{comment}',function($postId, $commentId){

});

Route::get('/user', '/UserController@index');

Route::match(['get','post'],'/',function(){

});

Route::any('/',function(){

});



