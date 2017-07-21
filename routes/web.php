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

Route::get('/token',function (){
    return csrf_token();
});

//Author
Route::get('admin/getAuthor/{objectId}','AuthorController@getAuthor');
Route::get('admin/getAuthorList','AuthorController@getAuthorList');
Route::get('admin/deleteAuthor/{objectId}','AuthorController@deleteAuthor');
Route::post('admin/addAuthor','AuthorController@addAuthor');
Route::post('admin/updateAuthor','AuthorController@updateAuthor');
//

//Tag
Route::get('admin/getTagList','TagController@getTagList');
Route::get('admin/deleteTag/{objectId}','TagController@deleteTag');
Route::post('admin/addTag','TagController@addTag');
Route::post('admin/updateTag','TagController@updateTag');
//

//post
Route::get('admin/getPost/{object_id}','PostController@');
Route::get('admin/getPostList');
Route::get('admin/deletePost');
Route::get('admin/publishPost');
Route::get('admin/withdrawPost');
Route::post('admin/updatePost');
Route::post('admin/addPost');
//
////news
//Route::get('admin/getNews');
//Route::get('admin/getNewsList');
//Route::get('admin/deleteNews');
//Route::get('admin/publishNews');
//Route::get('admin/withdrawNews');
//Route::post('admin/updateNews');
//Route::post('admin/addNews');
//
////comment
Route::get('admin/getCommentList/{post_id?}');
Route::get('admin/deleteComment/{object_id}');
Route::post('admin/approveComment/{object_id}');
Route::post('admin/rejectComment/{object_id}');

//
////Resource
//Route::get('admin/getResourceList');
//Route::get('admin/deleteResource');
//Route::post('admin/addResource');
//Route::post('admin/updateResource');