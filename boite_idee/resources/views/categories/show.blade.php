<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>Afficher une catégorie</title>
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
     <header>
        <nav class="navbar navbar-light bg-light">
          <form class="container-fluid justify-content-end">
            <a href="idees" class="btn btn-outline-success me-2" role="button"><i class="fas fa-lightbulb"></i> Idees</a>
            <a href="categories" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-tags"></i> Catégories</a>
            <a href="commentaires" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-comments"></i> Commentaires</a>
          </form>
        </nav>
      </header>
</head>
<body>
    <div class="container">
        <h1>Catégorie {{ $category->id }}</h1>

        <div class="category">
            <p class="category-label">Libellé :</p>
            <p>{{ $category->libelle }}</p>
        </div>

        <a href="{{ route('categories.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-list"></i> Retour à la liste
        </a>
        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning mt-3">
            <i class="fas fa-edit"></i> Modifier
        </a>
        <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i> Supprimer
            </button>
        </form>
    </div>
</body>
</html>
