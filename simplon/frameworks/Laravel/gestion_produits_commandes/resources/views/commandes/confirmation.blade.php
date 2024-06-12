{{-- resources/views/commandes/confirmation.blade.php --}}
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
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h1>Confirmation de commande</h1>

        <div class="container">
            <p>Merci pour votre commande !</p>
            <p>Référence de commande : {{ $commande->reference }}</p>
            <p>Date de commande : {{ $commande->date_commande }}</p>
            <p>Montant total : {{ $commande->montant_total }} cfa</p>

            <h2>Détails de la commande</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commande->ligneCommandes as $ligne)
                        <tr>
                            <td>{{ $ligne->produit->designation }}</td>
                            <td>{{ $ligne->quantite }}</td>
                            <td>{{ $ligne->prix_unitaire }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('index') }}" class="btn btn-primary">Retour à l'accueil</a>
        <div>
            <form action="{{ route('commande.valider') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Confirmer la commande</button>
            </form>
        </div>
    </div>
</body>
</html>
