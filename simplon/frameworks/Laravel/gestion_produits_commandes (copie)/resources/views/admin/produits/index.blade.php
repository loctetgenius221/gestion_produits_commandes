@extends('layouts.app')

@section('produit', 'Dashboard Produit')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/produit.css') }}">
</head>
<body>

<section class="section">
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

    <form action="{{ route('produits.traitement') }}" method="post" enctype="multipart/form-data" class="custom-form">
        @csrf

        <div class="form-group">
            <div class="form-col">
                <label for="categorie" class="form-label">Catégorie</label>
                <select name="categorie_id" id="categorie" class="form-control">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-col">
                <label for="reference" class="form-label">Référence</label>
                <input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="form-col">
                <label for="designation" class="form-label">Désignation</label>
                <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation') }}">
            </div>

            <div class="form-col">
                <label for="prix_unitaire" class="form-label">Prix Unitaire</label>
                <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" value="{{ old('prix_unitaire') }}" step="0.01">
            </div>
        </div>
        <div class="form-group">
            <div class="form-col">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-col">
                <label for="etat" class="form-label">État</label>
                <select name="etat" id="etat" class="form-control">
                    <option value="disponible">Disponible</option>
                    <option value="en_rupture">En rupture</option>
                    <option value="en_stock">En stock</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn">Ajouter un produit</button>
    </form>

    <table class="custom-table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Référence</th>
            <th scope="col">Désignation</th>
            <th scope="col">Prix Unitaire</th>
            <th scope="col">Image</th>
            <th scope="col">État</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
            <tr>
                <th scope="row">{{ $produit->id }}</th>
                <td>{{ $produit->user ? $produit->user->name : 'N/A' }}</td>
                <td>{{ $produit->categorie->libelle }}</td>
                <td>{{ $produit->reference }}</td>
                <td>{{ $produit->designation }}</td>
                <td>{{ $produit->prix_unitaire }}</td>
                <td><img src="{{ asset('storage/'.$produit->image) }}" alt="{{ $produit->designation }}" width="50"></td>
                <td>{{ $produit->etat }}</td>
                <td>
                    <a href="{{ route('produits.modifier', $produit->id) }}" class="btn-produit btn-update"><i class="fa-solid fa-pencil"></i></a>
                    <a href="{{ route('produits.supprimer', $produit->id) }}" class="btn-produit btn-delete"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>

</body>
</html>

@endsection
