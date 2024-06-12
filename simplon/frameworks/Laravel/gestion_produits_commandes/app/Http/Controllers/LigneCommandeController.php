<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\Commande;

use Illuminate\Support\Facades\Auth;

class LigneCommandeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function afficher() {
        $ligneCommandes = LigneCommande::all();
        return view('lignecommandes.panier', compact('ligneCommandes'));
    }




    public function ajouterProduit(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
            'prix_unitaire' => 'required|numeric',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non authentifié.');
        }

        $commande = $user->commandes()->where('etat_commande', 'panier')->first();

        // Si aucune commande en cours n'existe, en créer une
        if (!$commande) {
            $commande = Commande::create([
                'etat_commande' => 'panier',
                'reference' => 'CMD-' . uniqid(),
                'user_id' => $user->id,
            ]);
        }

        $montantTotal = $request->quantite * $request->prix_unitaire;

        $ligneCommande = new LigneCommande([
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite,
            'prix_unitaire' => $request->prix_unitaire,
            'commande_id' => $commande->id,
            'montant_total' => $montantTotal,
        ]);

        $saved = $ligneCommande->save();

        if (!$saved) {
            return redirect()->back()->withErrors(['message' => 'Erreur lors de l\'ajout du produit. Veuillez réessayer.']);
        }

        // Recalculer le total de la commande
        $commande->montant_total = $commande->ligneCommandes->sum('montant_total');
        $commande->save();

        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès.');
    }




    public function supprimerProduit($id)
    {
        $ligneCommande = LigneCommande::find($id);
        if ($ligneCommande) {
            $ligneCommande->delete();
        }
        return redirect()->back()->with('success', 'Produit supprimé du panier avec succès.');
    }



    public function confirmerCommande() {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non authentifié.');
        }

        $commande = $user->commandes()->where('etat_commande', 'panier')->first();

        if (!$commande) {
            return redirect()->back()->with('error', 'Aucune commande en cours.');
        }

        $lignesCommande = $commande->ligneCommandes;
        $montantTotal = 0;

        foreach ($lignesCommande as $ligne) {
            if (!$ligne->produit) {
                return redirect()->back()->with('error', 'Une ou plusieurs lignes de commande ne sont pas associées à un produit valide.');
            }
            // Calculer le montant total de la commande
            $montantTotal += $ligne->produit->prix_unitaire * $ligne->quantite;
        }

        // Mettre à jour la commande avec le montant total
        $commande->montant_total = $montantTotal;
        $commande->save();

        return view('commandes.confirmation', compact('commande'));
    }





    public function validerCommande(Request $request) {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non authentifié.');
        }

        $commande = $user->commandes()->where('etat_commande', 'panier')->first();

        if (!$commande) {
            return redirect()->back()->with('error', 'Aucune commande en cours.');
        }

        // Mettre à jour l'état de la commande
        $commande->etat_commande = 'confirmée';
        $commande->save();


        // Mettre à jour le montant total de la commande

        // Vider le panier (supprimer les lignes de commande associées à la commande)
        LigneCommande::where('commande_id', $commande->id)->delete();

        // Déconnecter l'utilisateur
        Auth::logout();

        return redirect()->route('index')->with('success', 'Commande validée avec succès.');
    }

}
