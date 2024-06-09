<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {

        $categories = Categorie::all();
        $produits = Produit::all();
        return view('frontend.index', compact('categories', 'produits'));
    }
}
