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

Route::get('inscription','InscriptionController@afficher');
Route::post('inscription','InscriptionController@traiter')->name('inscription');

Route::get('connexion','ConnexionController@afficher');
Route::post('connexion','ConnexionController@traiter')->name('connexion');
