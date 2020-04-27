<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use Illuminate\Http\Request;
use Session;
class ProfilController extends Controller
{
    public function afficher(){
        //dd(auth()->user());
        //if(auth()->guest()){
        //    return redirect('/');
        //}
        return view('profil/profil');
    }
    
    public function deconnexion(){
        Session::forget('utilisateur');
        return redirect('/');
    }
    
}