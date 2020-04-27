@extends('layout')
@section('contenu')
<div class="container">
  <div>
    <h2>S'inscrire</h2>
  </div>
  @if(!empty($echec))
  <div id="notifMsg" class="alert alert-danger">
      {{ $echec }}
  </div>
  @endif
  <form action="/inscription" method="post">
      
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nom">Nom</label>
    <input required name="nom" class="form-control" id="nom" placeholder="Nom" value="{{old('nom')}}">
        @if($errors->has('nom'))
            <p>{{$errors->first('nom')}}</p>
        @endif
    </div>

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input required name="prenom" class="form-control" id="prenom" placeholder="Prénom" value="{{old('prenom')}}">
        @if($errors->has('prenom'))
            <p>{{$errors->first('prenom')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input required type="email" name="email" class="form-control" id="email" placeholder="xyz@example.com" value="{{old('email')}}">
        @if($errors->has('email'))
            <p>{{$errors->first('email')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="date_de_naissance">Date de naissance</label>
        <input required name="date_de_naissance" type="date" class="form-control" id="date" placeholder="01/01/2000" value="{{old('date_de_naissance')}}">
        @if($errors->has('date_de_naissance'))
            <p>{{$errors->first('date_de_naissance')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="num">Numéro de téléphone</label>
        <input required name="num" class="form-control" id="num" placeholder="0123456789" value="{{old('num')}}">
        @if($errors->has('num'))
            <p>{{$errors->first('num')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="cni">CNI</label>
        <input required name="cni" class="form-control" id="cni" placeholder="" value="{{old('cni')}}">
        @if($errors->has('cni'))
            <p>{{$errors->first('cni')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" required name="password" class="form-control" id="password">
        @if($errors->has('password'))
            <p>{{$errors->first('password')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmation du mot de passe</label>
        <input type="password" required name="password_confirmation" class="form-control" id="password_confirmation">
        @if($errors->has('password_confirmation'))
            <p>{{$errors->first('password_confirmation')}}</p>
        @endif
    </div>

  <button type="submit" class="btn btn-primary">S'inscrire</button>
   
  </form>
</div>
@endsection