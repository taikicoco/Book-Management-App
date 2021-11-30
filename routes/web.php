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

//toppage
Route::get('/','AppController@index')->name('admin.index');

//ユーザー登録機能
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン機能
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


//User関連機能
Route::get('/users/list','UserController@users_list')->name('users.list');
Route::get('/users/edit/{id}','UserController@users_edit')->name('users.edit');
Route::post('/users/edit/{id}','UserController@users_update')->name('users.update');

//libray機能
Route::get('libray','LibraryController@index')->name('library.index');//libraryTopPage
//register
Route::get('libray/register/search','LibraryController@register_add')->name('library.register.add');//登録・検索画面
Route::post('library/register/search','LibraryController@register_search')->name('library.register.search');//検索結果
Route::post('library/register/','LibraryController@register')->name('rakuten.register');//本の登録->本の一覧画面へ

//list
Route::post('libray/list/search','LibraryController@search')->name('library.search');
Route::get('libray/list','LibraryController@all_list')->name('library.list');
Route::get('libray/list/{id}','LibraryController@detail')->name('library.detail');
Route::post('libray/list/{id}','LibraryController@borrow')->name('library.borrow');
Route::post('libray/list/{id}/return','LibraryController@return_book')->name('library.return');

//borrow_books
Route::get('libray/mybooks','LibraryController@my_books')->name('library.my');
    





// //ログインチェック
// Route::group(['middleware' => ['auth']], function () {
// });

//ip制限
Route::group(['middleware' => 'iplimit'], function () {
    //ひとまずoff
});
//ip制限page
Route::get('invalid','AppController@invalid')->name('invalid');


Route::group(['middleware' => 'auth_login'], function () {
    //
});








// //task機能
//
//Route::get('task/list','AppController@task_list')->name('task.list');
// Route::post('task/list','AppController@getSearch')->name('admin.index.sort');
// Route::get('task/add/{id}','AppController@task_add')->name('task.add');
// Route::post('task/add/{id}','AppController@task_add_form')->name('task.add.form');
// Route::post('task/create/{id}','AppController@task_create')->name('task.create');
// Route::get('task/edit/{id}','AppController@task_edit')->name('task.edit');
// Route::post('task/edit/{id}','AppController@task_update')->name('task.update');

// //QR画像ダウンロード機能
// Route::get('qr','AppController@qr_list')->name('qr.list');
// Route::post('qr','AppController@qr_download')->name('qr.download');