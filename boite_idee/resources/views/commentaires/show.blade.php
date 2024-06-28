<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Commentaire {{ $commentaire->id }}</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
          <form class="container-fluid justify-content-end">
            <a href="idees" class="btn btn-outline-success me-2" role="button"><i class="fas fa-lightbulb"></i> Idees</a>
            <a href="categories" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-tags"></i> Catégories</a>
            <a href="commentaires" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-comments"></i> Commentaires</a>
          </form>
        </nav>
      </header>

    <style>
        .card {
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f0f0f0;
            padding: 10px 15px;
            border-radius: 4px 0 0 4px;
        }

        .card-body {
            padding: 15px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>

    <div class="container mt-5">
        <h1>Commentaire {{ $commentaire->id }}</h1>

        <div class="card">
            <div class="card-header">
                Détails du commentaire
            </div>
            <div class="card-body">
                <p><b>Libellé :</b> {{ $commentaire->libelle }}</p>
                <p><b>Nom complet auteur :</b> {{ $commentaire->nom_complet_auteur }}</p>
                <p><b>Créé le :</b> {{ $commentaire->created_at->format('d/m/Y H:i:s') }}</p>
                <p><b>Dernière mise à jour :</b> {{ $commentaire->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>

        <a href="{{ route('commentaires.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>
        <a href="{{ route('commentaires.edit', $commentaire) }}" class="btn btn-warning mt-3">
            <i class="fas fa-edit"></i> Modifier
        </a>
        <form action="{{ route('commentaires.destroy', $commentaire) }}" method="post" class="d-inline mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
