<!DOCTYPE html>
<html>
<head>
    <title>Statut de votre idée</title>
</head>
<body>
    <h1>Bonjour, {{ $idea->auteur_nom_complet }}</h1>
    <p>Votre idée intitulée "{{ $idea->libelle }}" a été {{ $status }}.</p>
</body>
</html>

