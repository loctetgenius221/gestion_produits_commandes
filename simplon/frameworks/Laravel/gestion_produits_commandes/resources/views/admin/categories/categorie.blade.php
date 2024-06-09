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


    <form action="{{ route('categories-traitement') }}" method="post" class="custom-form">
        @csrf

        <div class="form-group">
            <label for="libelle" class="form-label">Libelle</label>
            <input type="text" class="form-control" id="libelle" name="libelle" >
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
        <button type="submit" class="btn">Ajouter une catégorie</button>
    </form>

    <table class="custom-table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Libelle</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
            <tr>

                <th scope="row">{{ $categorie->id }}</th>
                <td>{{ $categorie->libelle }}</td>
                <td>
                    <a href="{{ route('categories-modifier', $categorie->id) }}" class="btn-categorie btn-update"><i class="fa-solid fa-pencil"></i></a>
                    <a href="" class="btn-categorie btn-delete"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>


</section>

</body>
</html>

@endsection

