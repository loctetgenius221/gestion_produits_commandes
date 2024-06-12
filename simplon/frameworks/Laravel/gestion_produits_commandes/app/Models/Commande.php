<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produit;
use App\Models\LigneCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reference',
        'montant_total',
        'date_commande',
        'etat_commande'
    ];

    public function user()
    {
        // Une commande appartient à un utilisateur.
        return $this->belongsTo(User::class);
    }

    public function ligneCommandes()
    {
        // Une commande peut contenir plusieurs lignes de commande.
        return $this->hasMany(LigneCommande::class);
    }

    public function produits()
    {
        // Une commande peut contenir plusieurs produits à travers les lignes de commande
        return $this->belongsToMany(Produit::class, 'ligne_commandes')->withPivot('quantity', 'prix_unitaire')->using(LigneCommande::class);
    }

    public function setReferenceAttribute($value)
    {
        // Générer une référence unique basée sur le timestamp actuel
        $this->attributes['reference'] = 'CMD-' . time();
    }
}
