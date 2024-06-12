<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\LigneCommande;

class LigneCommandeController extends Controller
{

    public function afficher() {
        $panier = session('panier');
        return view('lignecommandes.panier', compact('panier'));
    }

    public function ajouterProduit(Request $request) {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $produit = Produit::findOrFail($request->produit_id);
        $ligneCommande = [
            'produit' => $produit,
            'quantite' => $request->quantite,
            'prix_total' => $request->quantite * $produit->prix_unitaire,
        ];
        $panier = session()->get('panier', []);
        $panier[] = $ligneCommande;

        session()->put('panier', $panier);

        return redirect()->route('panier');
    }


    public function supprimerProduit($id)
    {
        $ligneCommande = LigneCommande::findOrFail($id);
        $ligneCommande->delete();

        return redirect()->back()->with('success', 'Produit supprimé du panier.');
    }

}
