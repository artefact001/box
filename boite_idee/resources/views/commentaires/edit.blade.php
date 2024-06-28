<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Modifier le commentaire {{ $commentaire->id }}</title>
    <style>
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
            <a href="{{ route('idees.index') }}" class="btn btn-outline-success me-2" role="button"><i class="fas fa-lightbulb"></i> Idées</a>
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-tags"></i> Catégories</a>
            <a href="{{ route('commentaires.index') }}" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-comments"></i> Commentaires</a>
        </form>
    </nav>
</header>

<div class="container mt-5">
    <h1>Modifier le commentaire {{ $commentaire->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('commentaires.update', $commentaire) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="libelle">Libellé :</label>
            <textarea id="libelle" name="libelle" class="form-control" rows="3" required>{{ $commentaire->libelle }}</textarea>
        </div>
        <div class="form-group">
            <label for="nom_complet_auteur">Nom complet auteur :</label>
            <input type="text" id="nom_complet_auteur" name="nom_complet_auteur" class="form-control" required value="{{ $commentaire->nom_complet_auteur }}">
        </div>
        <div class="form-group">
            <label for="idee_id" class="form-label">Idée :</label>
            <select name="idee_id" id="idee_id" class="form-control" required>
                @foreach($idees as $idee)
                    <option value="{{ $idee->id }}" {{ old('idee_id', $commentaire->idee_id ?? '') == $idee->id ? 'selected' : '' }}>{{ $idee->libelle }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Enregistrer les modifications
        </button>
    </form>

    <a href="{{ route('commentaires.show', $commentaire) }}" class="btn btn-secondary mt-3">
        <i class="fas fa-times"></i> Annuler
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
