<div class="container">
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
    <h1>Votre Panier</h1>
    @if (empty($panier))
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
                @foreach($panier as $produit)
                    <tr>
                        <td>{{ $produit['produit']->designation }}</td>
                        <td>{{ $produit['quantite'] }}</td>
                        <td>{{ $produit['produit']->prix_unitaire }}</td>
                        <td>{{ $produit['prix_total'] }}</td>
                        <td>
                            <!-- Ajouter un formulaire pour supprimer des éléments du panier -->
                            <form action="{{ route('panier.supprimer', $produit['produit']->id) }}" method="POST">
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
            <form action="{{ route('panier.passer-commande') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Passer la commande</button>
            </form>
        </div>
    @endif
</div>
