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
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <h1 class="title">Créer un nouveau compte</h1>

            <div class="form-group">
                <label for="name">Nom complet: </label>
                <input type="text" id="name" name="name" placeholder="nom" value="{{ old("name") }}" class="form-input">
                {{-- @error("name")
                    {{ $message }}
                @enderror --}}
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" placeholder="email" value="{{ old("email") }}" class="form-input">
                {{-- @error("email")
                    {{ $message }}
                @enderror --}}
            </div>
            <div class="form-group">
                <label for="password">Mot de passe: </label>
                <input type="password" id="password" name="password" placeholder="mot de passe" class="form-input">
                {{-- @error("password")
                    {{ $message }}
                @enderror --}}
            </div>

            <div>
                <a href="{{ route('login') }}" class="btn btn-secondary">Connexion</a>
                <button type="submit" class="btn-primary">Inscription</button>
            </div>

            {{-- Errors --}}
            @if($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $key => $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


        </form>
    </section>

</div>
</body>
</html>

