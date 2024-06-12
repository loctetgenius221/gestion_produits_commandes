<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produit_commande', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 8, 2);

            // Ajout du champ commande_id avec une valeur par défaut et nullable
            $table->unsignedBigInteger('commande_id')->nullable()->default(1);

            $table->timestamps();

            // Définition de la clé étrangère pour commande_id
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');

            // Clé étrangère pour produit_id
            $table->foreign('produit_id')->references('id')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_commande');
    }
};
