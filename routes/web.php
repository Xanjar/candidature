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

Route::group(['middleware' =>[ 'web']], function () {
    Route::get('inscription','InscriptionController@afficher');
    Route::post('inscription','InscriptionController@traiter')->name('inscription');

    Route::get('connexion','ConnexionController@afficher');
    Route::post('connexion','ConnexionController@traiter')->name('connexion');
    Route::get('deconnexion', 'ProfilController@deconnexion');
});

Route::group(['middleware' => [App\Http\Middleware\CheckConnexion::class]], function () {
    Route::get('profil','ProfilController@afficher');
    
});
