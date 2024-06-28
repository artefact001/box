<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des idées</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <form class="container-fluid justify-content-end">
                <a href="idees" class="btn btn-outline-success me-2" role="button">Idées</a>
                <a href="categories" class="btn btn-sm btn-outline-secondary" role="button">Catégories</a>
                <a href="commentaires" class="btn btn-sm btn-outline-secondary" role="button">Commentaires</a>

                @guest
                <a href="login" class="btn btn-sm btn-outline-secondary" role="button">Connexion</a>
                @endguest

                @auth
                <a href="logout" class="btn btn-sm btn-outline-secondary" role="button">Déconnexion</a>
                @endauth
            </form>
        </nav>
    </header>

    <div class="container">
        <h1>Liste des idées</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('idees.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Créer une nouvelle idée
        </a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Auteur</th>
                    <th>Status</th>
                    <th>Catégories</th>
                    <th>Commentaires</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($idees as $idee)
                    <tr>
                        <td>{{ $idee->id }}</td>
                        <td>{{ $idee->libelle }}</td>
                        <td>{{ $idee->description }}</td>
                        <td>{{ $idee->auteur_nom_complet }}</td>
                        <td>{{ $idee->status }}</td>
                        <td>
                        {{$idee->categorie->libelle}}
                            {{-- @foreach ($idee->categories as $categorie)
                                <span class="badge bg-secondary">{{ $categorie->libelle }}</span>
                            @endforeach --}}
                        </td>
                        <td>
                            <ul>
                                @foreach ($idee->commentaires as $commentaire)
                                    <li>{{ $commentaire->libelle }} par {{ $commentaire->nom_complet_auteur }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('idees.show', $idee) }}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Afficher
                            </a>
                            <a href="{{ route('idees.edit', $idee) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('idees.destroy', $idee) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette idée ?')">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>


