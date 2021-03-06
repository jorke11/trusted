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

use App\Models;

Route::get('/', function () {
    $title_db = Models\Administration\Parameters::where("group", "main_title")->first();
    $title = "Trusted";
    if ($title_db != null) {
        $title = $title_db->value;
    }


    return view('welcome', compact("title"));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/template', 'TestController@index');


require __DIR__ . '/administration.php';
require __DIR__ . '/report.php';
require __DIR__ . '/operation.php';
require __DIR__ . '/security.php';
