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

//Auth::loginUsingId(1);

Route::get('/', function () {
    //roles y permisos
    //https://www.youtube.com/watch?v=I6eG8jPKRnU
    //https://laravel.com/docs/5.4/authorization#registering-policies
    //https://www.youtube.com/channel/UC07xim4Gg8kOk3uZwMrGNeQ/search?query=laravel

    // $users = DB::select('select * from user where active = ?', [1]);
    $users = [];
    //$user = Auth::loginUsingId($user_id);
    // abort(404, 'Not Found!');
    // return view('layouts.home', ['users' => $users]);
    // return view('layouts.ferreteria');

    // if (Auth::guest()) {
        return redirect('/home');
    // } else {
    //     return "jajo";
    // }

});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile', function() {
    return view('auth.profile');
})->name('profile')->middleware('auth');
