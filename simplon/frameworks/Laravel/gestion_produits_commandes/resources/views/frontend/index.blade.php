
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Kane & Frères</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

<!-- Navigation -->
<nav class="navbar">
    <div class="container">
        <a href="" class="logo">Kane & Frères</a>
        <ul class="nav-links">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Produits</a></li>
            <li><a href="#">Catégories</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="#" class="btn login-btn">Connexion</a>
            <a href="#" class="btn signup-btn">Inscription</a>
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
            <div class="category">Fruits</div>
            <div class="category">Légumes</div>
            <div class="category">Boissons</div>
            <div class="category">Snacks</div>
        </div>
    </div>
</section>

<!-- Bannière de Produits -->
<section class="product-banner">
    <div class="container">
        <h2>Produits en vedette</h2>
        <div class="banner">
            <img src="https://img.freepik.com/photos-gratuite/concept-banniere-supermarche-ingredients_23-2149421145.jpg?t=st=1717971869~exp=1717975469~hmac=b9e26cc4907bf79f468eae14e620240de53da755151fb598bfe6e05f1a690fb8&w=1380" alt="Produits en vedette">
        </div>
    </div>
</section>

<!-- Produits par Catégorie -->
<section class="products-by-category">
    <div class="container">
        <h2>Produits par Catégorie</h2>
        <div class="category-products">
            <div class="category">
                <h3>Fruits</h3>
                <div class="products">
                    <div class="product">Produit 1</div>
                    <div class="product">Produit 2</div>
                </div>
            </div>
            <div class="category">
                <h3>Légumes</h3>
                <div class="products">
                    <div class="product">Produit 1</div>
                    <div class="product">Produit 2</div>
                </div>
            </div>
            <!-- Ajoutez d'autres catégories si nécessaire -->
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
