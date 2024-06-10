<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LigneCommande;

class LigneCommandeController extends Controller
{

    public function afficher() {

        $ligneCommandes = LigneCommande::all();
        return view('lignecommandes.panier', compact('ligneCommandes'));
    }

    public function ajouterProduit(Request $request) {

        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
            'prix_unitaire' => 'required|numeric',
        ]);


        // Créer une nouvelle ligne de commande avec le prix total calculé
        $ligneCommande = new LigneCommande([
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite,
            'prix_unitaire' => $request->prix_unitaire,
        ]);
        $ligneCommande->save();

        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès.');
    }

}
