<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.produits.index');
    }



    // Crud Commandes
    public function commandes()
    {
        $commandes = Commande::all();
        return view('admin.commandes.index', compact('commandes'));
    }

    public function modifierCommande(Request $request, $id)
    {
        $commande = Commande::find($id);
        if ($commande) {
            $commande->etat_commande = $request->input('etat_commande');
            $commande->save();

            return redirect()->back()->with('success', 'État de la commande mis à jour avec succès.');
        }

        return redirect()->back()->with('error', 'Commande non trouvée.');
    }

    // Crud Catégories
    public function categories() {

        $categories = Categorie::all();
        return view('admin.categories.categorie', compact('categories'));
    }

    public function ajouterTraitement(Request $request) {

        $request->validate([
            'libelle' => 'required|string'
        ]);
        $categorie = new Categorie();
        $categorie->libelle = $request->libelle;
        $categorie->save();

        return redirect()->route('admin.categories')->with('success', 'Catégorie ajoutée avec succès');
    }

    public function modifier($id) {

        $categorie = Categorie::findOrFail($id);
        return view('admin.categories.modifier', compact('categorie'));
    }

    public function modifierTraitement(Request $request) {

        $request->validate([

            'libelle' => 'required|string'
        ]);
        $categorie = Categorie::find($request->id);
        $categorie->libelle = $request->libelle;
        $categorie->update();

        return redirect()->route('admin.categories')->with('success', 'Catégorie modifié avec succès');
    }

    public function supprimer($id) {

        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('admin.categories')->with('success', 'Catégorie supprimer avec succès');
    }




    public function clients() {
        return view('admin.clients');
    }
}
