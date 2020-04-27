<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use Illuminate\Http\Request;
use Session;


class ConnexionController extends Controller
{
    public function afficher(){
        return view('inscription/connexion');
    }
    

    public function traiter(){
        request()->validate([
            'email'=>['required'],
            'password'=> ['required'],
        ]);
        
        auth()->attempt([
            'mail'=>request('email'),
            'password'=>request('password'),
        ]);
        
        if(auth()->check()){
            //dd(auth()->user());
            Session::put('utilisateur', auth()->user());
            return redirect('/profil');
        }

        $data['echec']='Vos identifiants sont incorrects';
        return view('inscription/connexion',$data);
    }
}