<?php
Auth::routes();
Route::get('logout-user','HomeController@logout')->name('logout.user');
Route::namespace('Admin')->prefix('admin')->group(function (){
    Route::resource('posts','PostController');
});
Route::namespace('Front')->group(function(){
    Route::get('news/{slug}','FrontController@news')->name('news.show');
});
