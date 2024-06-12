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

    <form action="{{ route('produits.modifier.traitement', $produit->id) }}" method="post" enctype="multipart/form-data" class="custom-form">
        @csrf
        @method('PUT')
        

        <div class="form-group">
            <div class="form-col">
                <label for="categorie_id" class="form-label">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-col">
                <label for="reference" class="form-label">Référence</label>
                <input type="text" class="form-control" id="reference" name="reference" value="{{ $produit->reference }}">
            </div>
        </div>
        <div class="form-group">
            <div class="form-col">
                <label for="designation" class="form-label">Désignation</label>
                <input type="text" class="form-control" id="designation" name="designation" value="{{ $produit->designation }}">
            </div>

            <div class="form-col">
                <label for="prix_unitaire" class="form-label">Prix Unitaire</label>
                <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" value="{{ $produit->prix_unitaire }}" step="0.01">
            </div>
        </div>
        <div class="form-group">
            <div class="form-col">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($produit->image)
                    <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->designation }}" width="100">
                @endif
            </div>

            <div class="form-col">
                <label for="etat" class="form-label">État</label>
                <select name="etat" id="etat" class="form-control">
                    <option value="disponible" {{ $produit->etat == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="en_rupture" {{ $produit->etat == 'en_rupture' ? 'selected' : '' }}>En rupture</option>
                    <option value="en_stock" {{ $produit->etat == 'en_stock' ? 'selected' : '' }}>En stock</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn">Mettre à jour le produit</button>
    </form>

</section>

</body>
</html>

@endsection
