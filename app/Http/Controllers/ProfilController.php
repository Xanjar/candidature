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
        $data=array();
        $data['utilisateur']=Utilisateur::where('id_utilisateur',Session::get('utilisateur')->id_utilisateur)->first();
        return view('profil/profil',$data);
    }
    
    public function deconnexion(){
        Session::forget('utilisateur');
        return redirect('/');
    }

    public function modifier(){
        request()->validate([
            'nom'=>['required'],
            'prenom'=>['required'],
            'date_de_naissance'=>['required'],
            'email'=>['required'],
            'num'=>['required'],
            'cni'=>['required'],
            'password'=> ['confirmed'],
        ]);
        try {
            $util = Session::get('utilisateur');

            if(Utilisateur::where('mail',request('email'))->count()&&$util->mail!=request('email')){
                $data['echec']='L\'email est déjà attribué';
                return view('profil/modifier',$data);
            }
            if(Utilisateur::where('cni',request('cni'))->count()&&$util->cni!=request('cni')){
                $data['echec']='Ce cni est déjà attribué';
                return view('profil/modifier',$data);
            }
            if(Utilisateur::where('telephone',request('num'))->count()&&$util->telephone!=request('num')){
                $data['echec']='Ce numéro de téléphone est déjà attribué';
                return view('profil/modifier',$data);
            }
            $utilisateur=array();
            $utilisateur['nom']=request('nom');
            $utilisateur['prenom']=request('prenom');
            $utilisateur['mail']=request('email');
            $utilisateur['prenom']=request('prenom');
            $utilisateur['date_de_naissance']=request('date_de_naissance');
            $utilisateur['telephone']=request('num');
            if(!empty(request('password'))){
                $utilisateur['password']=bcrypt(request('password'));
            }
            $utilisateur['cni']=request('cni');
            Utilisateur::where('id_utilisateur',$util->id_utilisateur)->update($utilisateur);
        
        } catch(\Illuminate\Database\QueryException $e){
            $data['echec']='Echec dans la modification'.$e;
            return view('profil/modifier',$data);
        }
        $data['success']='Modification réussi';
        $data['utilisateur'] = Utilisateur::where('id_utilisateur',$util->id_utilisateur)->first();
        return view('profil/modifier',$data);
    }

    public function afficherModif(){
        $data=array();
        $data['utilisateur'] = Utilisateur::where('id_utilisateur',Session::get('utilisateur')->id_utilisateur)->first();
        return view('profil/modifier',$data);
    }
    
}