<?php

use Illuminate\Support\Facades\Route;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::get('/', function () {
        if(Auth::check()){
            return redirect('home');
        } else return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/parents' , 'Backend\ParentController');
    Route::resource('/students' , 'Backend\StudentController');
    Route::resource('/stages' , 'Backend\StageController');
    Route::resource('/levels' , 'Backend\LevelController');
    Route::resource('/friends' , 'Backend\FriendController');
    Route::resource('/chats' , 'Backend\ChatController');
    Route::resource('/admins' , 'Backend\AdminController');
    Route::get('/chat/getMsgs' , 'Backend\ChatController@getMsgs');
    Route::get('/admin/resetParent' , 'Backend\AdminController@resetParent');
    Route::get('/admin/resetStudent' , 'Backend\AdminController@resetStudent');


    Route::resource('/parentRequests' , 'Backend\ParentJoinRequetsController');
    Route::resource('/studentRequests' , 'Backend\StudentJoinRequetsController');

    Route::get('getLevels/{id}' , 'Backend\StudentController@getLevels')->name('getLevels');
    Route::get('stages/destroy/{id}' , 'Backend\StageController@destroy');
    Route::get('levels/destroy/{id}' , 'Backend\LevelController@destroy');
    Route::get('parents/destroy/{id}' , 'Backend\ParentController@destroy');
    Route::get('parents/enable/{id}' , 'Backend\ParentController@enable');
    Route::get('students/destroy/{id}' , 'Backend\StudentController@destroy');
    Route::get('students/enable/{id}' , 'Backend\StudentController@enable');
    Route::get('getAddEditRemoveColumnDataStage' , 'Backend\StageController@getAddEditRemoveColumnData');
    Route::get('getAddEditRemoveColumnDataLevel' , 'Backend\LevelController@getAddEditRemoveColumnData');
    Route::get('getAddEditRemoveColumnDataParent' , 'Backend\ParentController@getAddEditRemoveColumnData');
    Route::get('getAddEditRemoveColumnDataStudent' , 'Backend\StudentController@getAddEditRemoveColumnData');
    Route::get('getAddEditRemoveColumnParentRequest' , 'Backend\ParentJoinRequetsController@getAddEditRemoveColumnData');
    Route::get('getAddEditRemoveColumnStudentRequest' , 'Backend\StudentJoinRequetsController@getAddEditRemoveColumnData');
    Route::get('viewBlocked' , 'Backend\ParentController@viewBlocked');

    Route::get('parent/getBlocked' , 'Backend\ParentController@getBlocked' );

    Route::get('acceptParent/{id}' , 'Backend\ParentJoinRequetsController@acceptParent');
    Route::get('acceptStudent/{id}' , 'Backend\StudentJoinRequetsController@acceptStudent');
    Route::get('sendNoteForParent' , 'Backend\ParentJoinRequetsController@sendNoteForParent');





});
