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
    //$users = DB::select('select * from users where active = ?', [1]);
    $users = [];
    //$user = Auth::loginUsingId($user_id);
    // abort(404);
    return view('layouts.home', ['users' => $users]);
});
