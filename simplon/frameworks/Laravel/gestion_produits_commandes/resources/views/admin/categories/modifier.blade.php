@extends('layouts.app')

@section('categorie', 'Dashboard Categorie')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/categorie.css') }}">

</head>
<body>


<section class="section">
    <!-- Message de succès -->
    @if (session('success'))
    <div class="alert-succes">
        {{ session('success') }}
    </div>
    @endif


    <form action="{{ route('categories-modifier-traitement', ) }}" method="post" class="custom-form">
        @csrf
        <input type="text" name="id" style="display: none;" value="{{ $categorie->id }}">

        <div class="form-group">
            <label for="libelle" class="form-label">Libelle</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $categorie->libelle }}">
        </div>
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
        <button type="submit" class="btn">Modifier la catégorie</button>
    </form>

</section>

</body>
</html>

@endsection

