<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle idée</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
 <header>
    <nav class="navbar navbar-light bg-light">
      <form class="container-fluid justify-content-end">
        <a href="{{ route('idees.index') }}" class="btn btn-outline-success me-2" role="button"><i class="fas fa-lightbulb"></i> Idées</a>
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-tags"></i> Catégories</a>
        <a href="{{ route('commentaires.index') }}" class="btn btn-sm btn-outline-secondary" role="button"><i class="fas fa-comments"></i> Commentaires</a>
      </form>
    </nav>
  </header>
</head>
<body>
    <div class="container">
        <h1>Créer une nouvelle idée</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('idees.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="libelle">Libellé :</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="auteur_nom_complet">Nom complet de l'auteur :</label>
                <input type="text" class="form-control" id="auteur_nom_complet" name="auteur_nom_complet" required>
            </div>

            <div class="form-group">
                <label for="auteur_email">Email de l'auteur :</label>
                <input type="email" class="form-control" id="auteur_email" name="auteur_email" required>
            </div>

            <div class="form-group">
                <label for="status">Status :</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="nouveau">Nouveau</option>
                    @auth
                        <option value="approuvé">Approuvé</option>
                        <option value="refusé">Refusé</option>
                    @endauth
                </select>
            </div>

            {{-- Include the category selection dropdown --}}
            <div class="form-group">
                <label for="categorie_id" class="form-label">Catégorie :</label>
                <select name="categorie_id" id="categorie_id" class="form-control" required>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer l'idée</button>
        </form>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
