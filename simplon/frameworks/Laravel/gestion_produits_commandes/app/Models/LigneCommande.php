<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneCommande extends Model
{
    use HasFactory;
    protected $table = 'produit_commande';


    protected $fillable = [
        'commande_id',
        'produit_id',
        'quantite',
        'prix_unitaire'
    ];
    protected $attributes = [
        'commande_id' => null, // Valeur par défaut
    ];

    public function commande()
    {
        // Une ligne de commande appartient à une commande.
        return $this->belongsTo(Commande::class);
    }

    public function produit()
    {
        // Une ligne de commande appartient à un produit
        return $this->belongsTo(Produit::class);
    }
}
