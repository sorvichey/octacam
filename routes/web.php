<?php

// Front End
Route::get('/',"FrontController@index");
Route::get('/search',"FrontController@search");
Route::get('/kh/search',"FrontController@search_kh");
Route::get('/fr/search',"FrontController@search_fr");
Route::get('/kh',"FrontController@khmer");
Route::get('/fr',"FrontController@french");
Route::get('/page/{id}', "FrontPageController@index");
Route::get('/kh/post/category/{id}', "FrontController@category_kh");
Route::get('/kh/post/detail/{id}', "FrontController@detail_kh");
Route::get('/post/category/{id}', "FrontController@category");
Route::get('/fr/post/category/{id}', "FrontController@category_fr");
Route::get('/post/detail/{id}', "FrontController@detail_en");
Route::get('/fr/post/detail/{id}', "FrontController@detail_fr");
Route::get('/video/detail/{id}', "FrontController@video_detail");
Route::get('/post/{id}', "FrontController@post");
Auth::routes();

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
// Back End
Route::get('/admin',"HomeController@index");
Route::get('/admin/dashboard',"HomeController@index");

// Post
Route::get('/admin/post', "PostController@index");
Route::get('/admin/post/create', "PostController@create");
Route::get('/admin/post/create', "PostController@create");
Route::post('/admin/post/save', "PostController@save");
Route::get('/admin/post/delete/{id}', "PostController@delete");
Route::get('/admin/post/edit/{id}', "PostController@edit");
Route::post('/admin/post/update', "PostController@update");
Route::get('/admin/post/view/{id}', "PostController@view");
Route::get('/admin/post/pin/return/{id}', "PostController@pin_back");
Route::get('/admin/post/pin/{id}', "PostController@pin");
Route::get('/admin/post/getsubcategory/{id}', "PostController@get_sub_category");
Route::get('/admin/post/getsubcategory/edit/{id}', "PostController@get_sub_category_edit");
// Page
Route::get('/admin/page', "PageController@index");
Route::get('/admin/page/create', "PageController@create");
Route::post('/admin/page/save', "PageController@save");
Route::get('/admin/page/delete/{id}', "PageController@delete");
Route::get('/admin/page/edit/{id}', "PageController@edit");
Route::post('/admin/page/update', "PageController@update");
Route::get('/admin/page/view/{id}', "PageController@view");

// catogory
Route::get('/admin/category', "CategoryController@index");
Route::get('/admin/category/create', "CategoryController@create");
Route::get('/admin/category/edit/{id}', "CategoryController@edit");
Route::get('/admin/category/delete/{id}', "CategoryController@delete");
Route::post('/admin/category/save', "CategoryController@save");
Route::post('/admin/category/update', "CategoryController@update");
Route::get('/admin/category/detail/{id}', "CategoryController@detail");

// sub catogory
Route::get('/admin/sub_category/create', "SubCategoryController@create");
Route::get('/admin/sub_category/edit/{id}', "SubCategoryController@edit");
Route::get('/admin/sub_category/delete/{id}', "SubCategoryController@delete");
Route::post('/admin/sub_category/save', "SubCategoryController@save");
Route::post('/admin/sub_category/update', "SubCategoryController@update");

// user route
Route::get('/user', "UserController@index");
Route::get('/user/profile', "UserController@load_profile");
Route::get('/user/reset-password', "UserController@reset_password");
Route::post('/user/change-password', "UserController@change_password");
Route::get('/user/finish', "UserController@finish_page");
Route::post('/user/update-profile', "UserController@update_profile");
Route::get('/user/delete/{id}', "UserController@delete");
Route::get('/user/create', "UserController@create");
Route::post('/user/save', "UserController@save");
Route::get('/user/edit/{id}', "UserController@edit");
Route::post('/user/update', "UserController@update");
Route::get('/user/update-password/{id}', "UserController@load_password");
Route::post('/user/save-password', "UserController@update_password");

// role
Route::get('/role', "RoleController@index");
Route::get('/role/create', "RoleController@create");
Route::post('/role/save', "RoleController@save");
Route::get('/role/delete/{id}', "RoleController@delete");
Route::get('/role/edit/{id}', "RoleController@edit");
Route::post('/role/update', "RoleController@update");
Route::get('/role/permission/{id}', "PermissionController@index");
Route::post('/rolepermission/save', "PermissionController@save");

Route::get('/home', 'HomeController@index')->name('home');

// Slide 

// slide show
Route::get('/admin/slide', "SlideController@index");
Route::get('/admin/slide/create', "SlideController@create");
Route::post('/admin/slide/save', "SlideController@save");
Route::get('/admin/slide/edit/{id}', "SlideController@edit");
Route::post('/admin/slide/update', "SlideController@update");
Route::get('/admin/slide/delete/{id}', "SlideController@delete");


// qoute
Route::get('/admin/qoute', "QouteController@index");
Route::get('/admin/qoute/create', "QouteController@create");
Route::post('/admin/qoute/save', "QouteController@save");
Route::get('/admin/qoute/edit/{id}', "QouteController@edit");
Route::post('/admin/qoute/update', "QouteController@update");
Route::get('/admin/qoute/delete/{id}', "QouteController@delete");

// video
Route::get('/admin/video', "VideoController@index");
Route::get('/admin/video/create', "VideoController@create");
Route::post('/admin/video/save', "VideoController@save");
Route::get('/admin/video/edit/{id}', "VideoController@edit");
Route::post('/admin/video/update', "VideoController@update");
Route::get('/admin/video/delete/{id}', "VideoController@delete");
