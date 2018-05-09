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

use Azure\Events\UserSignedUp;
use Azure\Events\UserWasBanned;
use Azure\User;
use Illuminate\Support\Facades\Route;

Route::get('/event', function () {
    $user = new User();

    event(new UserWasBanned($user));

    return view('welcome');
});

Route::resource('/home', 'HomeController');
Route::resource('/vue', 'VueController');

Route::get('/main', function () {
    return view('main');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('documents/{document}', 'DocumentsController@show');



Route::get('/redis', function() {
    // 1. Publish event with Redis

    $redis = new Redis();
    $redis->publish('test-channel', json_encode(['test' => 'test12']));
    //event(new UserSignedUp('JohnDoe'));

    // 2. Node.js + Redis subscribers to the event
    // 3. Use socket.io to emit to all clients.
    return view('lessons-io');
});


Route::get('/webpack', function() {
    return view('webpack');
});


Route::get('/busydirectors', function() {
    $ea = App\Lesson::where('id', '<', 3);
    return (new \App\Queries\BusyDirectors($ea))->get();
});



Route::group(['prefix' => 'api/v1'], function() {
   Route::resource('lessons', 'LessonsController');
});