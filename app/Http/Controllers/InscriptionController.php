<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function afficher(){
        return view('inscription/inscription');
    }

    public function traiter(){

        request()->validate([
            'nom'=>['required'],
            'prenom'=>['required'],
            'date_de_naissance'=>['required'],
            'email'=>['required'],
            'num'=>['required'],
            'cni'=>['required'],
            'password'=> ['required','confirmed','min:8'],
            'password_confirmation' => ['required'],
        ]);
        try {
            if(Utilisateur::where('mail',request('email'))->count()){
                $data['echec']='L\'email existe déjà';
                return view('inscription/inscription',$data);
            }
            if(Utilisateur::where('cni',request('cni'))->count()){
                $data['echec']='Ce cni est déjà attribué';
                return view('inscription/inscription',$data);
            }
            if(Utilisateur::where('telephone',request('num'))->count()){
                $data['echec']='Ce numéro de téléphone est déjà attribué';
                return view('inscription/inscription',$data);
            }


            $inscrit = new Utilisateur;
            $inscrit->nom=request('nom');
            $inscrit->mail=request('email');
            $inscrit->prenom=request('prenom');
            $inscrit->date_de_naissance=request('date_de_naissance');
            $inscrit->telephone=request('num');
            $inscrit->password=bcrypt(request('password'));
            $inscrit->profil='etu';
            $inscrit->cni=request('cni');
            $inscrit->save();
        } catch(\Illuminate\Database\QueryException $e){
            $data['echec']='Echec dans l\'inscription'.$e;
            return view('welcome',$data);
        }
        $data['succes']='Vous êtes inscrit';
        return view('welcome',$data);
    }
}