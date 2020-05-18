<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use Illuminate\Http\Request;
use Session;


class AdminController extends Controller
{
    public function afficher(){
        $data = array();
        $data['utilisateur']=Utilisateur::where('profil','prof')->get();
        return view('admin/listeprof',$data);
    }

    public function ajouter(){
        request()->validate([
            'email'=>['required'],
        ]);
        try {
            if(Utilisateur::where('mail',request('email'))->count()){
                $data['echec']='L\'email existe déjà';
                return view('inscription/inscription',$data);
            }

            $inscrit = new Utilisateur;
            $inscrit->mail=request('email');
            $inscrit->password=bcrypt('motdepasse');
            $inscrit->profil='prof';
            $inscrit->first_connexion=1;
            $inscrit->save();
        } catch(\Illuminate\Database\QueryException $e){
            $data['echec']='Echec dans l\'ajout'.$e;
            $data['utilisateur']=Utilisateur::where('profil','prof')->get();
            return view('admin/listeprof',$data);
        }
        $data['succes']='Professeur ajouté';
        $data['utilisateur']=Utilisateur::where('profil','prof')->get();
        return view('admin/listeprof',$data);
    }
    
}