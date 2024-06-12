<?php

use App\Models\LigneCommande;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LigneCommandeController;

Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::get('/produits/{id}', [FrontendController::class, 'detail'])->name('produits.detail');


Route::middleware(['auth'])->group(function () {

    // Les routes pour la ligne de commande
    Route::get('/ligneCommande', [LigneCommandeController::class, 'afficher'])->name('panier');
    Route::post('/ligneCommande/ajouter-produit', [LigneCommandeController::class, 'ajouterProduit'])->name('panier.ajouter');
    Route::delete('/ligneCommande/supprimer-produit/{id}', [LigneCommandeController::class, 'supprimerProduit'])->name('panier.supprimer');
});


Route::middleware(['auth'])->group(function () {
    // Route::post('/panier/passer-commande', [CommandeController::class, 'passerCommande'])->name('panier.passer-commande');
    // Route::get('/commande/confirmation', [CommandeController::class, 'confirmation'])->name('commande.confirmation');

    Route::get('/panier', [CommandeController::class, 'afficherPanier'])->name('panier.afficher');
    Route::post('/panier/passer-commande', [CommandeController::class, 'passerCommande'])->name('panier.passer-commande');
    Route::post('/commande/confirmer', [CommandeController::class, 'confirmerCommande'])->name('commande.confirmer');

});

// Les routes pour le dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Crud Produits
    Route::get('/produits', [ProduitController::class, 'index'])->name('admin.produits');
    Route::post('/produits', [ProduitController::class, 'ajouter'])->name('produits.traitement');
    Route::get('/produits/{produit}/modifier', [ProduitController::class, 'modifier'])->name('produits.modifier');
    Route::put('/produits/{produit}', [ProduitController::class, 'modifierTraitement'])->name('produits.modifier.traitement');
    Route::get('/produits/{produit}', [ProduitController::class, 'supprimer'])->name('produits.supprimer');


    Route::get('/admin/commandes', [AdminController::class, 'commandes'])->name('admin.commandes');

    // Crud pour les catégories
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/admin/categories/ajouter/traitement', [AdminController::class, 'ajouterTraitement'])->name('categories-traitement');
    Route::get('/admin/categories/modifier{id}', [AdminController::class, 'modifier'])->name('categories-modifier');
    Route::post('/admin/categories/modifier/traitement', [AdminController::class, 'modifierTraitement'])->name('categories-modifier-traitement');
    Route::get('/categories/supprimer{id}', [AdminController::class, 'supprimer'])->name('categories-supprimer');



    Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.clients');

});

// Route pour les Authentification
Route::get("/register", [RegisterController::class, 'create'])->name('register');
Route::post("/register", [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::post('logout', LogoutController::class)->name('logout');
