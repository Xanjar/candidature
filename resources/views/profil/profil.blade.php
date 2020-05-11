@extends('layout')
@section('contenu')

<div class="container">
    <h1>Mon compte</h1>

<h3>Bienvenue {{$utilisateur->nom}} {{$utilisateur->prenom}}</h3>


    <a href="/profil/modifier" class="btn btn-info">Modifier profil</a>
    <a href="/dossier/gerer" class="btn btn-info">Gérer dossier</a>


    <a href="/deconnexion" class="btn btn-primary">Se déconnecter</a>
</div>
@endsection