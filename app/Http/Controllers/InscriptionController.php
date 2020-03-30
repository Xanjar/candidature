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
            'date'=>['required'],
            'num'=>['required'],
            'cni'=>['required'],
            'password'=> ['required','confirmed','min:8'],
            'password_confirmation' => ['required'],
        ]);

        try {
            if(Utilisateur::where('email',request('email'))->count()){
                $data['echec']='L\'email existe déjà';
                return view('inscription/inscription',$data);
            }

            $inscrit = new Utilisateur;
            $inscrit->nom=request('nom');
            $inscrit->prenom=request('prenom');
            $inscrit->date_de_naissance=request('date');
            $inscrit->telephone=request('num');
            $inscrit->password=bcrypt(request('password'));
            $inscrit->profil='etu';
            $inscrit->cni=request('cni');
            $inscrit->save();
        } catch(\Illuminate\Database\QueryException $e){
            $data['echec']='Echec dans l\'inscription';
            return view('welcome',$data);
        }
        $data['succes']='Vous êtes inscrit';
        return view('welcome',$data);
    }
}