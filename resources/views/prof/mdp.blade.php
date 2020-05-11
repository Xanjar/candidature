@extends('layout')
@section('contenu')
<div class="container">
    <div>
        <h2>Modifier mots de passe</h2>
    </div>
    <div class="text-right">
        <a href="/prof/liste" class="btn btn-primary">Retour liste</a>
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
  <form action="/prof/modifmdp" method="post">
      
    {{ csrf_field() }}
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

  <button type="submit" class="btn btn-primary">Modifier</button>
   
  </form>
</div>
@endsection