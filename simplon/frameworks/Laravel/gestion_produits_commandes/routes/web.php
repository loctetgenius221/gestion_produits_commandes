<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LigneCommandeController;

// Route pour la page d'accueil et les détails des produits
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/produits/{id}', [FrontendController::class, 'detail'])->name('produits.detail');

// Routes pour le panier et les lignes de commande
Route::get('/panier', [LigneCommandeController::class, 'afficher'])->name('panier');
Route::post('/panier/ajouter-produit', [LigneCommandeController::class, 'ajouterProduit'])->name('panier.ajouter-produit');
Route::delete('/panier/supprimer/{id}', [LigneCommandeController::class, 'supprimerProduit'])->name('panier.supprimer');

// Routes pour les commandes
Route::post('/commande/confirmer', [LigneCommandeController::class, 'confirmerCommande'])->name('commande.confirmer');
Route::post('/commande/valider', [LigneCommandeController::class, 'validerCommande'])->name('commande.valider');

// Routes pour l'administration (avec middleware auth)
Route::middleware(['auth'])->group(function () {
    // Dashboard admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // CRUD Commandes
    Route::get('/admin/commandes', [AdminController::class, 'commandes'])->name('admin.commandes');
    Route::put('/admin/commandes/{id}', [AdminController::class, 'modifierCommande'])->name('admin.commandes.modifier');

    // CRUD Produits
    Route::get('/admin/produits', [ProduitController::class, 'index'])->name('admin.produits');
    Route::post('/admin/produits', [ProduitController::class, 'ajouter'])->name('produits.traitement');
    Route::get('/admin/produits/{produit}/modifier', [ProduitController::class, 'modifier'])->name('produits.modifier');
    Route::put('/admin/produits/{produit}', [ProduitController::class, 'modifierTraitement'])->name('produits.modifier.traitement');
    Route::delete('/admin/produits/{produit}', [ProduitController::class, 'supprimer'])->name('produits.supprimer');

    // CRUD Catégories
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/admin/categories', [AdminController::class, 'ajouterTraitement'])->name('categories.traitement');
    Route::get('/admin/categories/{id}/modifier', [AdminController::class, 'modifier'])->name('categories.modifier');
    Route::put('/admin/categories/{id}', [AdminController::class, 'modifierTraitement'])->name('categories.modifier.traitement');
    Route::delete('/admin/categories/{id}', [AdminController::class, 'supprimer'])->name('categories.supprimer');

    // Gestion des clients
    Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.clients');
});

// Routes pour l'authentification
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
