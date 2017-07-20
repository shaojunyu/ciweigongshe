<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return View('admin.index');
})->middleware('auth')->name('admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Author
Route::get('admin/getAuthor','Author@getAuthor');
Route::get('admin/getAuthorList','Author@getAuthorList');
Route::get('admin/deleteAuthor','Author@deleteAuthor');
Route::post('admin/addAuthor','Author@addAuthor');
Route::post('admin/updateAuthor','Author@updateAuthor');

//Tag
Route::get('admin/getTagList');
Route::get('admin/deleteTag');
Route::post('admin/addTag');
Route::post('admin/updateTag');

//post
Route::get('admin/getPost');
Route::get('admin/getPostList');
Route::get('admin/deletePost');
Route::get('admin/publishPost');
Route::get('admin/withdrawPost');
Route::post('admin/updatePost');
Route::post('admin/addPost');

//news
Route::get('admin/getNews');
Route::get('admin/getNewsList');
Route::get('admin/deleteNews');
Route::get('admin/publishNews');
Route::get('admin/withdrawNews');
Route::post('admin/updateNews');
Route::post('admin/addNews');

//comment
Route::get('admin/getCommentList');
Route::get('admin/deleteComment');
Route::post('admin/approveComment');
Route::post('admin/rejectComment');

//Resource
Route::get('admin/getResourceList');
Route::get('admin/deleteResource');
Route::post('admin/addResource');
Route::post('admin/updateResource');