<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Kane & Frères</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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

<!-- Hero Header -->
<header class="hero">
    <div class="hero-content">
        <h1>Bienvenue sur Kane & Frères E-market</h1>
        <p>Les meilleurs produits alimentaires à portée de main</p>
        <a href="#" class="btn cta-btn">Commander Maintenant</a>
    </div>
</header>

<!-- Avantages -->
<section class="advantages">
    <div class="container">
        <h2>Pourquoi commander chez nous ?</h2>
        <div class="advantages-cards">
            <div class="card">
                <h3>Livraison rapide</h3>
                <p>Nous assurons une livraison rapide et fiable pour tous nos clients.</p>
            </div>
            <div class="card">
                <h3>Produits de qualité</h3>
                <p>Nos produits sont soigneusement sélectionnés pour garantir la meilleure qualité.</p>
            </div>
            <div class="card">
                <h3>Service client 24/7</h3>
                <p>Notre service client est disponible 24/7 pour répondre à toutes vos questions.</p>
            </div>
        </div>
    </div>
</section>

<!-- Catégories -->
<section class="categories">
    <div class="container">
        <h2>Nos Catégories</h2>
        <div class="categories-list">
            @foreach($categories as $categorie)
                <div class="category">{{ $categorie->libelle }}</div>
            @endforeach
        </div>
    </div>
</section>

<!-- Bannière de Produits -->
<section class="product-banner">
</section>

<!-- Produits -->
<section class="products">
    <div class="container">
        <h2>Tous les Produits</h2>
        <div class="product-cards">
            @foreach($produits as $produit)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->designation }}">
                    <div class="product-details">
                        <h4>{{ $produit->designation }}</h4>
                        <p>Prix: {{ $produit->prix_unitaire }} cfa</p>
                        <div class="status-label {{ strtolower($produit->etat) }}">{{ $produit->etat }}</div>
                        <a href="{{ route('produits.detail', $produit->id) }}" class="btn">Voir plus</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Newsletter -->
<section class="newsletter">
    <div class="container">
        <h2>Abonnez-vous à notre Newsletter</h2>
        <form action="#" method="post">
            <input type="email" name="email" placeholder="Votre email" required>
            <button type="submit" class="btn">S'abonner</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <p>&copy; 2024 Mon E-commerce. Tous droits réservés.</p>
            <ul class="footer-links">
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="#">Conditions d'utilisation</a></li>
            </ul>
        </div>
    </div>
</footer>

</body>
</html>

