<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container text-center">
  <div class="row">
    <div class="col s12">
            <h1>Gestion des utilisateurs</h1>
            <hr>
          @if (session('status'))
                <div class="alert alert-success">
                 {{ session('status') }}
                </div>
          @endif
            <a href="/ajouter" class="btn btn-primary">Ajouter un Utilisateur</a>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Qualification</th>
                        <th>Opération</th>
                        
                    </tr>
                </thead>
                <tbody>
                  @php
                    $ide = 1; 
                  @endphp
                    @foreach($utilisateurs as $utilisateur)
                    <tr>
                        <td>{{$ide}}</td>
                        <td>{{$utilisateur->nom}}</td>
                        <td>{{$utilisateur->prenom}}</td>
                        <td>{{$utilisateur->qualification}}</td>
                        <td>
                            <a href="/update-utilisateur/{{$utilisateur->id}}" class="btn btn-info">Modifier</a>
                            <a href="/delete-utilisateur/{{$utilisateur->id}}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                    @php
                      $ide +=1;
                    @endphp
                    @endforeach
                </tbody>

                
            </table>
    </div>
   
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
