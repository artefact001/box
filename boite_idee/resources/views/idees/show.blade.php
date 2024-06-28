<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'idée #{{ $idee->id }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <form class="container-fluid justify-content-end">
                <a href="{{ route('idees.index') }}" class="btn btn-outline-success me-2" role="button"><i class="fas fa-lightbulb"></i> Idées</a>
                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-tags"></i> Catégories</a>
                <a href="{{ route('commentaires.index') }}" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-comments"></i> Commentaires</a>
            </form>
        </nav>
    </header>

    <div class="container">
        <h1>Détail de l'idée #{{ $idee->id }}</h1>

        <div class="card">
            <div class="card-header">
                {{ $idee->libelle }}
            </div>
            <div class="card-body">
                <p>Description : {{ $idee->description }}</p>
                <p>Auteur : {{ $idee->auteur_nom_complet }}</p>
                <p>Email : {{ $idee->auteur_email }}</p>
                <p>Status : {{ $idee->status }}</p>
                {{-- <p>Date de création : {{ $idee->date_creation->format('d/m/Y H:i') }}</p> --}}
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Catégories associées
            </div>
            <div class="card-body">
                <ul>

                {{$idee->categorie->libelle}}
                    {{-- @foreach ($idee->categories as $categorie)
                        <li>{{ $categorie->libelle }}</li>
                    @endforeach --}}
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Commentaires
            </div>
            <div class="card-body">
                <ul>
                    @foreach ($idee->commentaires as $commentaire)
                        <li>{{ $commentaire->libelle }} par {{ $commentaire->nom_complet_auteur }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <a href="{{ route('idees.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> Retour à la liste</a>
        <a href="{{ route('idees.edit', $idee) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Modifier</a>
        <form action="{{ route('idees.destroy', $idee) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette idée ?')"><i class="fas fa-trash-alt"></i> Supprimer</button>
        </form>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

