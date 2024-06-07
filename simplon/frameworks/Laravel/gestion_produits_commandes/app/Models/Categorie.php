<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle'
    ];

    public function produits()
    {
        // Une catégorie peut contenir plusieurs produit
        return $this->hasMany(Produit::class);
    }
}
