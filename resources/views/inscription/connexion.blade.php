@extends('layout')
@section('contenu')

<div class="container">
    <div>
      <h2>Se connecter</h2>
    </div>
    @if(!empty($echec))
    <div id="notifMsg" class="alert alert-danger">
        {{ $echec }}
    </div>
    @endif
    <form action="/connexion" method="post">
        
      {{ csrf_field() }}

      <div class="form-group">
          <label for="email">Email</label>
          <input required type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
          @if($errors->has('email'))
              <p>{{$errors->first('email')}}</p>
          @endif
      </div>
      <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" required name="password" class="form-control" id="password">
          @if($errors->has('password'))
              <p>{{$errors->first('password')}}</p>
          @endif
      </div>
      
  
    <button type="submit" class="btn btn-primary">Se connecter</button>
     
    </form>
</div>

@endsection