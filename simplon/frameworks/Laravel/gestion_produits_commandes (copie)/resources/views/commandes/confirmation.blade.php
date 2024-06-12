{{-- <!-- resources/views/commandes/confirmation.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande - Kane & Frères</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1>Confirmation de commande</h1>
        <div class="container">
            <h1>Confirmation de commande</h1>
            <p>Merci pour votre commande !</p>
            <p>Référence de commande : {{ $commande->reference }}</p>
            <p>Date de commande : {{ $commande->date_commande }}</p>
            <p>Montant total : {{ $commande->montant_total }} €</p>
        </div>
        <p>Merci pour votre commande !</p>
        <a href="{{ route('index') }}" class="btn btn-primary">Retour à l'accueil</a>
    </div>
</body>
</html> --}}


<div class="container">
    <h1>Confirmation de la commande</h1>
    <p>Référence de commande : {{ $reference }}</p>
    <p>Montant total : {{ $montantTotal }} €</p>

    <h2>Produits</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ligneCommandes as $ligne)
                <tr>
                    <td>{{ $ligne->produit->designation }}</td>
                    <td>{{ $ligne->quantite }}</td>
                    <td>{{ $ligne->produit->prix_unitaire }}</td>
                    <td>{{ $ligne->quantite * $ligne->produit->prix_unitaire }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('commande.confirmer') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Confirmer la commande</button>
    </form>
</div>
