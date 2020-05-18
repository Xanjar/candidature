@extends('layout')
@section('contenu')

<section class="section">
    <div class="container">
        <h2>Liste des dossiers</h2>
        <div class="text-right">
            <a href="/deconnexion" class="btn btn-primary">Se déconnecter</a>
        </div>
        <div class="text-right">
            <a href="/prof/modifmdp" class="btn btn-info">Modifier mot de passe</a>
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

        @if(!empty($dossier))
        <table class="table table-striped" data-toggle="table"
        data-search="true">
            <thead>
                <tr>
                    <th>Nom Prénom</th>
                    <th data-sortable="true">Niveau</th>
                    <th>C.V</th>
                    <th>Lettre de motivation</th>
                    <th>Relevé de notes</th>
                    <th>Screenshot</th>
                    <th>Formulaire</th>
                    <th>Carte d'identité</th>
                    <th>Statut</th>
                    <th>Commentaire</th>
                </tr>
        </thead>
            <tbody>
                @foreach($dossier as $d)
                <tr>
                    <td>{{ $utilisateur->where('id_utilisateur',$d['id_utilisateur'])->first()->nom }} {{ $utilisateur->where('id_utilisateur',$d['id_utilisateur'])->first()->prenom }}</td>
                    <td>{{$formation->where('id_formation',$d['id_formation'])->first()->libelle}}</td>
                    <td><a class="btn btn-info" href="/prof/doc/cv/{{$d['id_utilisateur']}}">Voir</a></td>
                    <td><a class="btn btn-info" href="/prof/doc/lettremotiv/{{$d['id_utilisateur']}}">Voir</a></td>
                    <td><a class="btn btn-info" href="/prof/doc/releve/{{$d['id_utilisateur']}}">Voir</a></td>
                    <td><a class="btn btn-info" href="/prof/doc/screenshot/{{$d['id_utilisateur']}}">Voir</a></td>
                    <td><a class="btn btn-info" href="/prof/doc/formulaire/{{$d['id_utilisateur']}}">Voir</a></td>
                    <td><a class="btn btn-info" href="/prof/doc/identite/{{$d['id_utilisateur']}}">Voir</a></td>
                    <td>
                        <form action="/prof/statut/{{$d['id_utilisateur']}}" method="post" class="form-inline">
                            {{ csrf_field() }}
                            <div class="form-group">   
                                <select name="statut" id="statut" class="form-control">
                                    @foreach ($status as $s)
                                        <option value="{{$s->id_status}}" @if(!empty($d['id_status']))@if($d['id_status']===$s->id_status) selected @endif @endif>
                                            {{$s->libelle}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-light ">Changer statut</button>
                        </form>
                    </td>
                    <td>{{$d->commentaire}}</td>
                </tr>
            
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center">
            <span>Aucun individu n'a pu être trouvé.</span>
        </div>
        @endif
    </div>
</section>

@endsection