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
        Schema::table('produit_commande', function (Blueprint $table) {
            $table->decimal('montant_total', 8, 2)->after('prix_unitaire');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produit_commande', function (Blueprint $table) {
            $table->dropColumn('montant_total');
        });
    }
};
