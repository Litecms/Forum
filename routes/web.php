<?php

// Resource routes  for category
Route::group(['prefix' => set_route_guard('web').'/forum'], function () {
    Route::resource('category', 'CategoryResourceController');
});

// Public  routes for category
Route::get('category/popular/{period?}', 'CategoryPublicController@popular');
Route::get('categories/', 'CategoryPublicController@index');
Route::get('forum/category/{slug?}', 'CategoryPublicController@show');


// Resource routes  for question
Route::group(['prefix' => set_route_guard('web').'/forum'], function () {
    Route::resource('question', 'QuestionResourceController');
});

// Public  routes for question
Route::get('question/popular/{period?}', 'QuestionPublicController@popular');
Route::get('forums/', 'QuestionPublicController@index');
Route::get('newdiscussion/', 'QuestionPublicController@newdiscussion');
Route::get('discussion/{slug?}', 'QuestionPublicController@show');


// Resource routes  for response
Route::group(['prefix' => set_route_guard('web').'/forum'], function () {
	Route::get('/bestanswer', 'ResponseResourceController@bestanswer');
    Route::resource('response', 'ResponseResourceController');
});

// Public  routes for response
Route::get('response/popular/{period?}', 'ResponsePublicController@popular');
Route::get('responses/', 'ResponsePublicController@index');
Route::get('response/{slug?}', 'ResponsePublicController@show');

