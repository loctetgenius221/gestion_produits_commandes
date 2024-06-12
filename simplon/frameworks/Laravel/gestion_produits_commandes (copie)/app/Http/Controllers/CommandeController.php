<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{

    // public function passerCommande(Request $request)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login')->with('error', 'Vous devez être authentifié pour passer une commande.');
    //     }

    //     // Générer une référence unique pour la commande
    //     $reference = $this->generateReference();

    //     $ligneCommandes = LigneCommande::whereNull('commande_id')->get();
    //     $montantTotal = $ligneCommandes->sum('prix_total');

    //     $commande = new Commande();
    //     $commande->user_id = auth()->id();
    //     $commande->reference = $reference;
    //     $commande->montant_total = $montantTotal;
    //     $commande->date_commande = now();
    //     $commande->save();

    //     // Associer les lignes de commande à la nouvelle commande
    //     $ligneCommandes = LigneCommande::whereNull('commande_id')->get();
    //     foreach ($ligneCommandes as $ligneCommande) {
    //         $ligneCommande->commande_id = $commande->id;
    //         $ligneCommande->save();
    //     }

    //     return view('commandes.confirmation');
    // }

    // /**
    //  * Générer une référence unique pour une commande.
    //  */
    // private function generateReference()
    // {
    //     return strtoupper(uniqid('CMD-'));
    // }



    public function afficherPanier()
    {
        $panier = session('commande', []);
        return view('lignecommandes.panier', compact('panier'));
    }

    public function passerCommande(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être authentifié pour passer une commande.');
        }

        $ligneCommandes = LigneCommande::whereNull('commande_id')->where('user_id', auth()->id())->get();
        $montantTotal = $ligneCommandes->sum('prix_total');
        $reference = $this->generateReference();

        session([
            'commande' => [
                'user_id' => auth()->id(),
                'reference' => $reference,
                'montant_total' => $montantTotal,
                'date_commande' => now(),
                'ligneCommandes' => $ligneCommandes->toArray(),
            ]
        ]);

        return view('commandes.confirmation', compact('ligneCommandes', 'montantTotal', 'reference'));
    }

    public function confirmerCommande(Request $request)
    {
        if (!session()->has('commande')) {
            return redirect()->route('panier.afficher')->with('error', 'Il y a eu un problème avec votre commande.');
        }

        $commandeData = session('commande');
        $commande = new Commande();
        $commande->user_id = $commandeData['user_id'];
        $commande->reference = $commandeData['reference'];
        $commande->montant_total = $commandeData['montant_total'];
        $commande->date_commande = $commandeData['date_commande'];
        $commande->save();

        foreach ($commandeData['ligneCommandes'] as $ligneCommande) {
            $ligneCommande = new LigneCommande($ligneCommande);
            $ligneCommande->commande_id = $commande->id;
            $ligneCommande->save();
        }

        session()->forget('commande');

        return view('commandes.success');
    }

        private function generateReference()
        {
            return strtoupper(uniqid('CMD-'));
        }
    }
