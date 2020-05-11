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
    if(Session::has('utilisateur')){
        if(Session::get('utilisateur')->profil === 'etu'){
            return redirect()->route('profil');
        }
        if(Session::get('utilisateur')->profil === 'prof'){
            return redirect()->route('liste');
        }
    }
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
    Route::get('profil','ProfilController@afficher')->name('profil');
    Route::get('dossier/gerer','DossierController@afficher');
    Route::post('dossier/deposer','DossierController@creer');
    Route::post('dossier/modifier','DossierController@modifier');
    Route::get('profil/modifier','ProfilController@afficherModif');
    Route::post('profil/modifier','ProfilController@modifier');
});

Route::group(['middleware' => [App\Http\Middleware\CheckConnexionProf::class]], function () {
    Route::get('prof/liste', 'ProfController@afficher')->name('liste');
    Route::post('prof/statut/{idutilisateur}', 'ProfController@statut');
    Route::get('prof/doc/{type}/{idutilisateur}', 'ProfController@fichier');
    Route::get('prof/modifmdp', 'ProfController@afficherModifMdp');
    Route::post('prof/modifmdp', 'ProfController@modifMdp');
});
