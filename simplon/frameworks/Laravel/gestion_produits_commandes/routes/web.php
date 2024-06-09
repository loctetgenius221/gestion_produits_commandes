<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Les routes pour le dashboard

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Crud Produits
    Route::get('/admin/produits', [AdminController::class, 'produits'])->name('admin.produits');
    

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
