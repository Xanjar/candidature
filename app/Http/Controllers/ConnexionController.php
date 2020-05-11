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
            if(auth()->user()->first_connexion){
                $utilisateur=array();
                $utilisateur['first_connexion']=0;
                Utilisateur::where('id_utilisateur',auth()->user()->id_utilisateur)->update($utilisateur);
                return redirect('/prof/modifmdp');
            }
            return redirect('/');
        }

        $data['echec']='Vos identifiants sont incorrects';
        return view('inscription/connexion',$data);
    }
}