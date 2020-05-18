<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use App\TypeFormation;
use App\Formation;
use App\Dossier;
use App\Status;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
class ProfController extends Controller
{
    public function afficher(){
        $data = array();
        $data['formation']=Formation::all();
        $data['typeformation']=TypeFormation::all();
        $data['dossier']=Dossier::all();
        $data['utilisateur']=Utilisateur::all();
        $data['status']=Status::all();
        return view('prof/liste',$data);
    }

    public function statut(Request $req, $idutilisateur){
        $data = array();
        $data['formation']=Formation::all();
        $data['typeformation']=TypeFormation::all();
        $data['utilisateur']=Utilisateur::all();
        $data['status']=Status::all();
        try {
            $dossier = array();
            $dossier['id_status']=$req->input('statut');
            Dossier::where('id_utilisateur',$idutilisateur)->update($dossier);
        } catch(\Illuminate\Database\QueryException $e) {
            $data['echec']='Echec dans le changement de statut';
            return view('prof/liste',$data);
        }
        $data['dossier']=Dossier::all();
        $data['success']='Changement effectué';
        return view('prof/liste',$data);
    }

    public function modifMdp(){
        request()->validate([
            'password'=> ['required','confirmed','min:8'],
            'password_confirmation' => ['required'],
        ]);
        try {
            $util = Session::get('utilisateur');
            $utilisateur=array();
            $utilisateur['password']=bcrypt(request('password'));
            Utilisateur::where('id_utilisateur',$util->id_utilisateur)->update($utilisateur);
        
        } catch(\Illuminate\Database\QueryException $e){
            $data['echec']='Echec dans la modification'.$e;
            return view('prof/mdp',$data);
        }
        $data['success']='Modification effectué';
        return view('prof/mdp',$data);
    }

    public function afficherModifMdp(){
        return view('prof/mdp');
    }

    public function fichier($type,$idutilisateur){
        $data = array();
        $data['formation']=Formation::all();
        $data['typeformation']=TypeFormation::all();
        $data['dossier']=Dossier::all();
        $data['utilisateur']=Utilisateur::all();
        $data['status']=Status::all();
        
        if($type==='cv'){
            $path = Dossier::where('id_utilisateur',$idutilisateur)->first()->cv;
            if($path===null){
                return view('prof/liste',$data);
            }
        }
        else if($type==='lettremotiv'){
            $path = Dossier::where('id_utilisateur',$idutilisateur)->first()->lettremotiv;
            if($path===null){
                return view('prof/liste',$data);
            }
        }
        else if($type==='releve'){
            $path = Dossier::where('id_utilisateur',$idutilisateur)->first()->releve;
            if($path===null){
                return view('prof/liste',$data);
            }
        }
        else if($type==='screenshot'){
            $path = Dossier::where('id_utilisateur',$idutilisateur)->first()->screenshot;
            if($path===null){
                return view('prof/liste',$data);
            }
        }
        else if($type==='identite'){
            $path = Dossier::where('id_utilisateur',$idutilisateur)->first()->identite;
            if($path===null){
                return view('prof/liste',$data);
            }
        }
        else if($type==='formulaire'){
            $path = Dossier::where('id_utilisateur',$idutilisateur)->first()->formulaire;
            if($path===null){
                return view('prof/liste',$data);
            }
        }


        return Storage::download($path);

    }

}