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
            <li><a href="{{ route('index') }}">Accueil</a></li>
            <li><a href="#">Produits</a></li>
            <li><a href="#">Catégories</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="btn login-btn">Connexion</a>
            <a href="{{ route('register') }}" class="btn signup-btn">Inscription</a>
        </div>
    </div>
</nav>

<div class="container">
    <h1>Votre Panier</h1>
    @if ($ligneCommandes->isEmpty())
        <p>Votre panier est vide.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ligneCommandes as $ligne)
                    <tr>
                        <td>{{ $ligne->produit->designation }}</td>
                        <td>{{ $ligne->quantite }}</td>
                        <td>{{ $ligne->produit->prix_unitaire }}</td>
                        <td>{{ $ligne->quantite * $ligne->produit->prix_unitaire }}</td>
                        <td>
                            <form action="{{ route('panier.supprimer', $ligne->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{-- <a href="{{ route('passer-commande') }}" class="btn btn-primary">Passer la commande</a> --}}
        </div>
    @endif
    @error('produit_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @error('quantite')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @error('prix_unitaire')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

</div>

</body>
</html>

