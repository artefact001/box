<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un commentaire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <h1>Créer un commentaire</h1>

        <form action="{{ route('commentaires.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="libelle">Libellé :</label>
                <textarea id="libelle" name="libelle" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="nom_complet_auteur">Nom complet auteur :</label>
                <input type="text" id="nom_complet_auteur" name="nom_complet_auteur" class="form-control" required>
            </div>

            {{-- Include the idea selection dropdown --}}
            <div class="form-group">
                <label for="idee_id" class="form-label">Idée :</label>
                <select name="idee_id" id="idee_id" class="form-control" required>
                    @foreach($idees as $idee)
                        <option value="{{ $idee->id }}" {{ old('idee_id') == $idee->id ? 'selected' : '' }}>{{ $idee->libelle }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i> Créer
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
