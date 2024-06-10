<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Kane & Frères</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<div class="container">
    <!-- Message de succès -->
    @if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @endif


    <a href="{{ route('index') }}" class="btn retour-btn">Retour</a>

<section class="auth-section">
    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <h1 class="title">Connexion</h1>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" placeholder="email" value="{{ old("email") }}" class="form-input">
            @error("email")
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Mot de passe: </label>
            <input type="password" id="password" name="password" placeholder="mot de passe" class="form-input">
            @error("password")
                {{ $message }}
            @enderror
        </div>

        <div>
            <button type="submit" class="btn-primary">Connexion</button>
            <a href="{{ route('register') }}" class="btn btn-secondary">Inscription</a>
        </div>





    </form>
</section>
</div>

</body>
</html>

