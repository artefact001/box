<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
        <h1>Login</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('auth.postLogin') }}" class="row g-3" onsubmit="return validateForm()">
            @csrf
            <!-- Email Address -->
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Entrez votre email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" autocomplete="current-password" placeholder="Entrez votre mot de passe" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-dark mt-3 full-width-btn">Connexion</button>
                <p>Vous n'avez pas de compte ? <a href="{{ url('/register') }}">Inscription</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<!-- JavaScript Validation -->

<script>
    function validateForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (!email) {
            alert('Veuillez entrer votre adresse email.');
            return false;
        }

        if (!password) {
            alert('Veuillez entrer votre mot de passe.');
            return false;
        }

        return true;
    }
</script>

</body>
</html>
