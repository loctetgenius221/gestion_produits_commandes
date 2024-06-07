<?php

namespace App\Models;

use App\Models\Commande;
use App\Models\Categorie;
use App\Models\LigneCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'designation',
        'prix_unitaire',
        'image',
        'etat',
        'categorie_id'
    ];

    public function categorie()
    {
        // Un produit appartient à une catégorie
        return $this->belongsTo(Categorie::class);
    }

    public function ligneCommandes()
    {
        // Un produit peut être présent dans plusieurs lignes de commande.
        return $this->hasMany(LigneCommande::class);
    }

    public function commandes()
    {
        // Un produit peut être associé à plusieurs commandes à travers les lignes de commande .
        return $this->belongsToMany(Commande::class, 'ligne_commandes')->withPivot('quantite', 'prix_unitaire')->using(LigneCommande::class);
    }
}
