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

Route::get('/admin','AdminController@index')->name('admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/token',function (){
    return csrf_token();
});

//Author
Route::get('admin/authorList', 'AuthorController@authorList');
Route::get('admin/getAuthor/{objectId}','AuthorController@getAuthor');
Route::get('admin/getAuthorList','AuthorController@getAuthorList');
Route::get('admin/deleteAuthor/{objectId}','AuthorController@deleteAuthor');
Route::get('admin/addAuthor','AuthorController@getAddAuthor');
Route::post('admin/addAuthor','AuthorController@postAddAuthor');
Route::get('admin/updateAuthor/{objectId}','AuthorController@getUpdateAuthor');
Route::post('admin/updateAuthor','AuthorController@postUpdateAuthor');
//

//Tag
Route::get('admin/getTagList','TagController@getTagList');
Route::get('admin/deleteTag/{objectId}','TagController@deleteTag');
Route::post('admin/addTag','TagController@addTag');
Route::post('admin/updateTag','TagController@updateTag');
//

//post
Route::get('admin/getPost/{object_id}','PostController@getPost');
Route::get('admin/getPostList','PostController@getPostList');
Route::get('admin/deletePost/{object_id}','PostController@deletePost');
Route::get('admin/publishPost/{object_id}','PostController@publishPost');
Route::get('admin/withdrawPost/{object_id}','PostController@withdrawPost');
Route::post('admin/updatePost','PostController@updatePost');
Route::post('admin/addPost','PostController@addPost');
//
////news
//Route::get('admin/getNews','NewsController@getNews');
Route::get('admin/getNewsList','NewsController@getNewsList');
Route::get('admin/deleteNews/{object_id}','NewsController@deleteNews');
//Route::get('admin/publishNews','NewsController');
//Route::get('admin/withdrawNews','NewsController');
Route::post('admin/updateNews','NewsController@updateNews');
Route::post('admin/addNews','NewsController@addNews');
//
////comment
Route::get('admin/getCommentList/{post_id?}');
Route::get('admin/deleteComment/{object_id}');
Route::post('admin/approveComment/{object_id}');
Route::post('admin/rejectComment/{object_id}');

//
//Resource
Route::get('admin/upload', 'ResourceController@renderUploadPage');
Route::get('admin/getImageList','ResourceController@getImageList');
Route::get('admin/getVideoList','ResourceController@getVideoList');
Route::get('admin/deleteResource','ResourceController@deleteResource');
Route::get('admin/getUploadToken/{type?}','ResourceController@getUploadToken');
//Route::post('admin/uploadAck','ResourceController@uploadAck');


//User
Route::get('wechatLogin','UserController@wechatLogin');

//public access
Route::get('/post/{object_id}','PublicController@showPost');
Route::get('/postList','PublicController@postList');
Route::get('/newsList','PublicController@newsList');
Route::get('/search','PublicController@search');
Route::post('/comment','PublicController@comment');
Route::get('/slide','PublicController@slide');
Route::get('/hotPost','PublicController@hotPost');