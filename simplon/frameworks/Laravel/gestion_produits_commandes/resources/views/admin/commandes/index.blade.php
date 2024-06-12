@extends('layouts.app')

@section('produit', 'Modifier Produit')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="{{ asset('css/produit.css') }}">
</head>
<body>

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Commandes</h1>

                <!-- Message de succès -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <!-- Messages d'erreur -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <table class="custom-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Utilisateur</th>
                        <th scope="col">Référence</th>
                        <th scope="col">Montant Total</th>
                        <th scope="col">Date de Commande</th>
                        <th scope="col">État de la Commande</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($commandes as $commande)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $commande->user ? $commande->user->name : 'N/A' }}</td>
                        <td>{{ $commande->reference }}</td>
                        <td>{{ $commande->montant_total }}</td>
                        <td>{{ $commande->date_commande }}</td>
                        <td>
                            <form action="{{ route('admin.commandes.modifier', $commande->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="etat_commande" onchange="this.form.submit()">
                                    <option value="encours" {{ $commande->etat_commande == 'encours' ? 'selected' : '' }}>En cours</option>
                                    <option value="confirmée" {{ $commande->etat_commande == 'confirmée' ? 'selected' : '' }}>Confirmée</option>
                                    <option value="validé" {{ $commande->etat_commande == 'validé' ? 'selected' : '' }}>Validé</option>
                                    <option value="annulé" {{ $commande->etat_commande == 'annulé' ? 'selected' : '' }}>Annulé</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="#" class="btn-produit btn-delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

</body>
</html>

@endsection
