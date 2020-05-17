@extends('layout')
@section('contenu')

<section class="section">
    <div class="container">
        <h2>Liste des profs</h2>
        <div class="text-right">
            <a href="/deconnexion" class="btn btn-primary">Se déconnecter</a>
        </div>
        @if(session('succes'))
        <div id="notifMsg" class="alert alert-success">
            {{ session('succes') }}
        </div>
        @elseif(session('echec'))
        <div id="notifMsg" class="alert alert-danger">
            {{ session('echec') }}
        </div>
        @endif

        <form action="/admin" method="post" enctype='multipart/form-data'>
      
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" name="email" class="form-control" id="email" placeholder="xyz@example.com">
                @if($errors->has('email'))
                    <p>{{$errors->first('email')}}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <br/>

        @if(!empty($utilisateur))
        <table class="table table-striped" data-toggle="table"
        data-search="true">
            <thead>
                <tr>
                    <th data-sortable="true">Email</th>
                </tr>
        </thead>
            <tbody>
                @foreach($utilisateur as $u)
                <tr>
                    <td>{{ $u->mail }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center">
            <span>Aucun prof n'a pu être trouvé.</span>
        </div>
        @endif
    </div>
</section>

@endsection