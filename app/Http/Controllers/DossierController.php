<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use App\TypeFormation;
use App\Formation;
use App\Dossier;
use Illuminate\Http\Request;
use Session;

class DossierController extends Controller
{
    public function afficher(){
        $data = array();
        $data['formation']=Formation::all();
        $data['typeformation']=TypeFormation::all();
        $data['dossier']=Dossier::where('id_utilisateur',Session::get('utilisateur')->id_utilisateur)->first();
        return view('dossier/deposer',$data);
    }

    public function creer(Request $req){
        $data = array();
        $data['formation']=Formation::all();
        $data['typeformation']=TypeFormation::all();
        try {
            $id = Session::get('utilisateur')->id_utilisateur;
            if(Dossier::where('id_utilisateur',$id)->count()){
                return redirect()->route('dossier/gerer');
            }
            $dossier = new Dossier;
            $dossier->id_formation=$req->input('id_formation');
            $dossier->id_type_formation=$req->input('id_type_formation');
            $dossier->commentaire=$req->input('commentaire');
            $dossier->id_utilisateur=$id;
            $dossier->id_status=1;
            $cv=$req->cv;
            $lettre=$req->lettre;
            $releve=$req->releve;
            $screenshot=$req->screenshot;
            $formulaire=$req->formulaire;
            if($cv!=null){
                $dossier->cv = $req->cv->storeAs($id, 'cv.'.$cv->extension());
            }
            else{
                $dossier->id_status=2;
            }
            if($lettre!=null){
                $dossier->lettremotiv = $lettre->storeAs($id,'lettre.'.$lettre->extension());
            }
            else{
                $dossier->id_status=2;
            }
            if($releve!=null){
                $dossier->releve = $releve->storeAs($id,'releve.'.$releve->extension());
            }
            else{
                $dossier->id_status=2;
            }
            if($screenshot!=null){
                $dossier->screenshot = $screenshot->storeAs($id,'screenshot.'.$screenshot->extension());
            }
            else{
                $dossier->id_status=2;
            }
            if($formulaire!=null){
                $dossier->formulaire = $formulaire->storeAs($id,'formulaire.'.$cv->extension());
            }
            else{
                $dossier->id_status=2;
            }
            $dossier->save();
        } catch(\Illuminate\Database\QueryException $e) {
            $data['echec']='Echec dans l\'envoi du dossier';
            return view('dossier/deposer',$data);
        }
        $data['dossier']=Dossier::where('id_utilisateur',$id)->first();
        $data['success']='Enregistrement du dossier';
        return view('dossier/deposer',$data);
    }

    public function modifier(Request $req){
        $data = array();
        $data['formation']=Formation::all();
        $data['typeformation']=TypeFormation::all();
        try {
            $id = Session::get('utilisateur')->id_utilisateur;
            $ancien =Dossier::where('id_utilisateur',$id)->first();
            $dossier = array();
            $dossier['id_formation']=$req->input('id_formation');
            $dossier['id_type_formation']=$req->input('id_type_formation');
            $dossier['commentaire']=$req->input('commentaire');
            $dossier['id_utilisateur']=$id;
            $dossier['id_status']=1;
            $cv=$req->cv;
            $lettre=$req->lettre;
            $releve=$req->releve;
            $screenshot=$req->screenshot;
            $formulaire=$req->formulaire;
            if($cv!=null){
                $dossier['cv'] = $req->cv->storeAs($id, 'cv.'.$cv->extension());
            }
            elseif($ancien->cv==null){
                $dossier['id_status']=2;
            }
            if($lettre!=null){
                $dossier['lettremotiv'] = $lettre->storeAs($id,'lettre.'.$lettre->extension());
            }
            elseif($ancien->lettremotiv==null){
                $dossier['id_status']=2;
            }
            if($releve!=null){
                $dossier['releve'] = $releve->storeAs($id,'releve.'.$releve->extension());
            }
            elseif($ancien->releve==null){
                $dossier['id_status']=2;
            }
            if($screenshot!=null){
                $dossier['screenshot'] = $screenshot->storeAs($id,'screenshot.'.$screenshot->extension());
            }
            elseif($ancien->screenshot==null){
                $dossier['id_status']=2;
            }
            if($formulaire!=null){
                $dossier['formulaire'] = $formulaire->storeAs($id,'formulaire.'.$cv->extension());
            }
            elseif($ancien->formulaire==null){
                $dossier['id_status']=2;
            }
            Dossier::where('id_utilisateur',$id)->update($dossier);
        } catch(\Illuminate\Database\QueryException $e) {
            $data['echec']='Echec dans l\'envoi du dossier';
            return view('dossier/deposer',$data);
        }
        $data['dossier']=Dossier::where('id_utilisateur',$id)->first();
        $data['success']='Enregistrement du dossier';
        return view('dossier/deposer',$data);
    }
}