@extends('layout')
@section('contenu')
<div class="container">
  <h1>Candidature</h1>
  @if(!empty($succes))
  <div id="notifMsg" class="alert alert-success">
      {{ $succes }}
  </div>
  @elseif(!empty($echec))
  <div id="notifMsg" class="alert alert-danger">
      {{ $echec }}
  </div>
  @endif
  <a href="/inscription" class="btn btn-primary">S'inscrire</a>
  <a href="/connexion" class="btn btn-secondary">Se connecter</a>
</div>
@endsection