@extends('layout')
@section('contenu')

<div class="container">
    <div>
      <h2>Dossier</h2>
    </div>
    <div class="text-right">
      <a href="/profil" class="btn btn-info">Retour profil</a>
    </div>
    @if(!empty($success))
    <div id="notifMsg" class="alert alert-success">
        {{ $success }}
    </div>
    @elseif(!empty($echec))
    <div id="notifMsg" class="alert alert-danger">
        {{ $echec }}
    </div>
    @endif
  
    <form action="/dossier/@if(!empty($dossier['id_dossier'])){{"modifier"}}@else{{"deposer"}}@endif" method="post" enctype='multipart/form-data'>
        
      {{ csrf_field() }}

      <div class="form-group">
        <label for="id_formation">Formation</label>
        <select name="id_formation" id="id_formation" class="form-control">
            @foreach ($formation as $f)
                <option value="{{$f->id_formation}}" @if(!empty($dossier['id_formation']))@if($dossier['id_formation']===$f->id_formation) selected @endif @endif>
                    {{$f->libelle}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="id_type_formation">Type de  formation</label>
        <select name="id_type_formation" id="id_type_formation" class="form-control">
            @foreach ($typeformation as $t)
                <option value="{{$t->id_type_formation}}" @if(!empty($dossier['id_type_formation']))@if($dossier['id_type_formation']===$t->id_type_formation) selected @endif @endif>
                    {{$t->libelle}}
                </option>
            @endforeach
        </select>
    </div>

      <div class="form-group">
        <label for="cv">C.V.</label>
        <input name="cv" type="file" class="form-control" id="cv" placeholder="Ajouter un C.V.">
      </div>

      <div class="form-group">
        <label for="lettre">Lettre de motivation</label>
        <input name="lettre" type="file" class="form-control" id="lettre" placeholder="Ajouter lettre">
      </div>
  

      <div class="form-group">
        <label for="releve">Relevés de notes de l’année précédente</label>
        <input name="releve" type="file" class="form-control" id="releve" placeholder="Ajouter les relevés">
      </div>
      
      <div class="form-group">
        <label for="screenshot">Imprime écran de l’ENT de l’année en cours</label>
        <input name="screenshot" type="file" class="form-control" id="screenshot" placeholder="Ajouter l'imprime écran">
      </div>
      
      <div class="form-group">
        <label for="formulaire">Formulaire d’inscription rempli</label>
        <input name="formulaire" type="file" class="form-control" id="formulaire" placeholder="Ajouter formulaire">
      </div>

      <div class="form-group">
        <label for="identite">Carte d'identité</label>
        <input name="identite" type="file" class="form-control" id="identite" placeholder="Ajouter CNI">
      </div>

      <div class="form-group">
        <label></label>
        <textarea name="commentaire" class="form-control" id="commentaire" placeholder="Commentaires">@if(!empty($dossier['commentaire'])){{$dossier['commentaire']}}@endif</textarea>
      </div>
  
    <button type="submit" class="btn btn-primary">Déposer dossier</button>
     
    </form>
</div>

@endsection