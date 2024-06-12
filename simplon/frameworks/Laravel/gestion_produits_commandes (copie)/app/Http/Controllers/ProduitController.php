<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProduitController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $produits = Produit::all();
        return view('admin.produits.index', compact('produits', 'categories'));
    }

    public function ajouter(Request $request) {

        $request->validate([
            'categorie_id' => 'required|integer|exists:categories,id',
            'reference' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'prix_unitaire' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'etat' => 'required|string|in:disponible,en_rupture,en_stock'

        ]);
        // Traitement de l'upload de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        }

        $produit = new Produit();
        $produit->user_id = Auth::id();
        $produit->categorie_id = $request->categorie_id;
        $produit->reference = $request->reference;
        $produit->designation = $request->designation;
        $produit->prix_unitaire = $request->prix_unitaire;
        $produit->image = $imagePath;
        $produit->etat = $request->etat;
        $produit->save();

        return redirect()->back()->with('success', 'Produit ajouté avec succès!');
    }

    public function modifier($id) {

        $produit = Produit::findOrFail($id);
        $categories = Categorie::all();

        return view('admin.produits.modifier', compact('produit', 'categories'));
    }

    public function modifierTraitement(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);

        $request->validate([
            'categorie_id' => 'required|integer',
            'reference' => 'required|string',
            'designation' => 'required|string',
            'prix_unitaire' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'etat' => 'required|string|in:disponible,en_rupture,en_stock'
        ]);

        $produit->categorie_id = $request->categorie_id;
        $produit->reference = $request->reference;
        $produit->designation = $request->designation;
        $produit->prix_unitaire = $request->prix_unitaire;
        $produit->etat = $request->etat;

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($produit->image) {
                Storage::disk('public')->delete($produit->image);
            }
            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $produit->image = $imagePath;
        }

        $produit->save();

        return redirect()->route('admin.produits')->with('success', 'Produit mis à jour avec succès!');
    }

    public function supprimer($id) {

        Produit::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Produit supprimé avec succès');
    }
}
