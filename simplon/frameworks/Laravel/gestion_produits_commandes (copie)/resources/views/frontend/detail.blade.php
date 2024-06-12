<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Kane & Frères</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>
<body>

<!-- Navigation -->
<nav class="navbar">
    <div class="container">
        <a href="" class="logo">Kane & Frères</a>
        <ul class="nav-links">
            <li><a href="{{ route('index') }}">Accueil</a></li>
            <li><a href="#">Produits</a></li>
            <li><a href="#">Catégories</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="{{ route('panier') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
        </ul>
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="btn login-btn">Connexion</a>
            <a href="{{ route('register') }}" class="btn signup-btn">Inscription</a>
        </div>
    </div>
</nav>

<div class="product-details">
    <!-- Message de succès -->
    @if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @endif
    <!-- Messages d'erreur -->
    @if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <a href="{{ route('index') }}" class="btn retour-btn">Retour</a>

    <div class="product-image">
        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->designation }}">
    </div>
    <div class="product-info">
        <h2>Réference: {{ $produit->reference }}</h2>
        <p>Désignation: {{ $produit->designation }}</p>
        <p>Catégorie: {{ $produit->categorie->libelle }}</p>
        <p>Prix: {{ $produit->prix_unitaire }}</p>
        <p>Etat: <span class="status {{ strtolower($produit->etat) }}">{{ $produit->etat }}</span></p>

        <!-- Formulaire pour ajouter au panier -->
        <form action="{{ route('panier.ajouter') }}" method="POST">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <input type="number" name="quantite" value="1">
            <input type="hidden" name="prix_unitaire" value="{{ $produit->prix_unitaire }}">
            <button type="submit" class="btn">Ajouter au Panier</button>
        </form>
    </div>
</div>


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <p>&copy; 2024 Kane & Frère E-market. Tous droits réservés.</p>
            <ul class="footer-links">
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="#">Conditions d'utilisation</a></li>
            </ul>
        </div>
    </div>
</footer>

</body>
</html>

