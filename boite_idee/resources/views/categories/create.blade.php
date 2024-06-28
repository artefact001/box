<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>Créer une catégorie</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

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

        .btn-primary i {
            margin-right: 5px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 4px;
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
        <h1>Créer une catégorie</h1>

        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="libelle" class="form-label">Libellé :</label>
                <input type="text" id="libelle" name="libelle" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i> Créer
            </button>
        </form>
    </div>
</body>
</html>
