<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use Illuminate\Http\Request;
use Session;
class DossierController extends Controller
{
    public function afficher(){
       
        return view('dossier/deposer');
    }
    public function traiter(){

    }
}