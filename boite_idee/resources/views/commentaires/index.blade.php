<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Commentaires</title>
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
        body {
            font-family: sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0;
        }

        .btn {
            padding: 8px 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
            display: flex;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            text-align: center;
        }

        .btn-info {
            background-color: #17a2b8;
            color: #fff;
            text-align: center;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #fff;
            text-align: center;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            text-align: center;
        }
    </style>

    <div class="container mt-5">
        <h1>Commentaires</h1>

        @if (count($commentaires) > 0)
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libellé</th>
                        <th>Auteur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commentaires as $commentaire)
                        <tr>
                            <td>{{ $commentaire->id }}</td>
                            <td>{{ $commentaire->libelle }}</td>
                            <td>{{ $commentaire->nom_complet_auteur }}</td>
                            <td>
                                <a href="{{ route('commentaires.show', $commentaire) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> Afficher
                                </a>
                                <a href="{{ route('commentaires.edit', $commentaire) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="{{ route('commentaires.destroy', $commentaire) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">Aucun commentaire trouvé pour le moment.</div>
        @endif

        <a href="{{ route('commentaires.create') }}" class="btn btn-success mt-3">
            <i class="fas fa-plus"></i> Ajouter un commentaire
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
