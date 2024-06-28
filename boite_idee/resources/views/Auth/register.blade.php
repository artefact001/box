<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #ddd1d1;
            padding-top: 50px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 30px;
            color: #343a40;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #a56e6e;
            border-color: #7e3d3d;
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-section, .image-section {
            flex: 1;
        }
        .image-section img {
            width: 80%;
            height: auto;
            border-radius: 8px;
        }
        .full-width-btn {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container form-container">
    <div class="image-section">
        <img src="{{ asset('/images/OIP.jpeg') }}" alt="Simplon Logo">
    </div>
    <div class="form-section">
        <h1>Inscription</h1>
        <form method="POST" action="{{ route('auth.postRegister') }}" class="row g-3" onsubmit="return validateForm()">
            @csrf

            <!-- Nom -->
            <div class="col-md-12">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                placeholder="Entrez votre nom_complet" title="Le nom ne doit contenir que des lettres et des espaces.">
                @error('nom')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                placeholder="Entrez votre email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="col-md-12">
                <label for="password" class="form-label">Mot de passe</label>
                <input id="password" type="password" class="form-control" name="password"
                placeholder="Entrez votre mot de passe" title="Le mot de passe doit contenir au moins 8 caractères.">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-dark mt-3 full-width-btn">Inscription</button>
                <p>Vous avez un compte ? <a href="{{ route('login') }}">Connexion</a></p>

            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function validateForm() {
        const telephone = document.getElementById('telephone').value;
        const phonePattern = /^\d{9}$/;
        if (!phonePattern.test(telephone)) {
            alert('Le numéro de téléphone doit contenir 09 chiffres.');
            return false;
        }
        return true;
    }
</script>
</body>
</html>
