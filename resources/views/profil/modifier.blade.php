@extends('layout')
@section('contenu')
<div class="container">
  <div>
    <h2>Modifier profil</h2>
  </div>
  <div class="text-right">
    <a href="/profil" class="btn btn-info">Retour profil</a>
  </div>
  @if(!empty($success))
  <div id="notifMsg" class="alert alert-success">
      {{ $success }}
  </div>
  @endif
  @if(!empty($echec))
  <div id="notifMsg" class="alert alert-danger">
      {{ $echec }}
  </div>
  @endif
  <form action="/profil/modifier" method="post">
      
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nom">Nom</label>
    <input required name="nom" class="form-control" id="nom" placeholder="Nom" value="@if(!empty($utilisateur['nom'])){{$utilisateur['nom']}}@endif">
        @if($errors->has('nom'))
            <p>{{$errors->first('nom')}}</p>
        @endif
    </div>

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input required name="prenom" class="form-control" id="prenom" placeholder="Prénom" value="@if(!empty($utilisateur['prenom'])){{$utilisateur['prenom']}}@endif">
        @if($errors->has('prenom'))
            <p>{{$errors->first('prenom')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input required type="email" name="email" class="form-control" id="email" placeholder="xyz@example.com"value="@if(!empty($utilisateur['mail'])){{$utilisateur['mail']}}@endif">
        @if($errors->has('email'))
            <p>{{$errors->first('email')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="date_de_naissance">Date de naissance</label>
        <input required name="date_de_naissance" type="date" class="form-control" id="date" placeholder="01/01/2000" value="@if(!empty($utilisateur['date_de_naissance'])){{$utilisateur['date_de_naissance']}}@endif">
        @if($errors->has('date_de_naissance'))
            <p>{{$errors->first('date_de_naissance')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="num">Numéro de téléphone</label>
        <input required name="num" class="form-control" id="num" placeholder="0123456789" value="@if(!empty($utilisateur['telephone'])){{$utilisateur['telephone']}}@endif">
        @if($errors->has('num'))
            <p>{{$errors->first('num')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="cni">CNI</label>
        <input required name="cni" class="form-control" id="cni" placeholder="" value="@if(!empty($utilisateur['cni'])){{$utilisateur['cni']}}@endif">
        @if($errors->has('cni'))
            <p>{{$errors->first('cni')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="password">
        @if($errors->has('password'))
            <p>{{$errors->first('password')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmation du mot de passe</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        @if($errors->has('password_confirmation'))
            <p>{{$errors->first('password_confirmation')}}</p>
        @endif
    </div>

  <button type="submit" class="btn btn-primary">Modifier</button>
   
  </form>
</div>
@endsection