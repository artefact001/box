<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'idée #{{ $idee->id }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Styles pour la page d'édition */
        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            border-radius: 4px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <form class="container-fluid justify-content-end">
                <a href="idees" class="btn btn-outline-success me-2" role="button"><i class="fas fa-lightbulb"></i> Idées</a>
                <a href="categories" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-tags"></i> Catégories</a>
                <a href="commentaires" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-comments"></i> Commentaires</a>
            </form>
        </nav>
    </header>

    <div class="container">
        <h1>Modifier l'idée #{{ $idee->id }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('idees.update', $idee) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="libelle" class="form-label">Libellé :</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $idee->libelle }}" required>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $idee->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="auteur_nom_complet" class="form-label">Nom complet de l'auteur :</label>
                <input type="text" class="form-control" id="auteur_nom_complet" name="auteur_nom_complet" value="{{ $idee->auteur_nom_complet }}" required>
            </div>

            <div class="form-group">
                <label for="auteur_email" class="form-label">Email de l'auteur :</label>
                <input type="email" class="form-control" id="auteur_email" name="auteur_email" value="{{ $idee->auteur_email }}" required>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status :</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="nouveau" @if ($idee->status == 'nouveau') selected @endif>Nouveau</option>
                @auth
                    <option value="approuvé" @if ($idee->status == 'approuvé') selected @endif>Approuvé</option>
                    <option value="refuser" @if ($idee->status == 'refuser') selected @endif>Refusé</option>
                @endauth
                </select>
            </div>

            <div class="form-group">
                <label for="categorie_id" class="form-label">Catégorie :</label>
                <select name="categorie_id" id="categorie_id" class="form-control" required>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('categorie_id', $idee->categorie_id) == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Modifier l'idée</button>
        </form>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
