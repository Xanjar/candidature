@extends('layout')
@section('contenu')

<div class="container">
    <div>
      <h2>Dossier</h2>
    </div>
  
    <form action="/dossier/deposer" method="post">
        
      {{ csrf_field() }}
      <div class="form-group">
        <label for="cv">C.V.</label>
        <input name="cv" type="file" class="form-control" id="cv" placeholder="Ajouter un C.V." required>
      </div>

      <div class="form-group">
        <label for="lettre">Lettre de motivation</label>
        <input name="lettre" type="file" class="form-control" id="lettre" placeholder="Ajouter lettre" required>
      </div>
  

      <div class="form-group">
        <label for="releve">Relevés de notes de l’année précédente</label>
        <input name="releve" type="file" class="form-control" id="releve" placeholder="Ajouter les relevés" required>
      </div>
      
      <div class="form-group">
        <label for="screenshot">Imprime écran de l’ENT de l’année en cours</label>
        <input name="screenshot" type="file" class="form-control" id="screenshot" placeholder="Ajouter l'imprime écran" required>
      </div>
      
      <div class="form-group">
        <label for="formulaire">Formulaire d’inscription rempli</label>
        <input name="formulaire" type="file" class="form-control" id="formulaire" placeholder="Ajouter formulaire" required>
      </div>
  
    <button type="submit" class="btn btn-primary">Déposer dossier</button>
     
    </form>
</div>

@endsection