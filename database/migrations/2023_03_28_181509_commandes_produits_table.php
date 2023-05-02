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
        Schema::create('commandesproduits', function (Blueprint $table) {
            $table->unsignedBigInteger('id_commande');
            $table->unsignedBigInteger('id_produit');
            $table->foreign('id_commande')->references('id')->on('commandes');
            $table->foreign('id_produit')->references('id')->on('produits');
            $table->string('Quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandesproduits');
        Schema::dropIfExists('commandes');
        Schema::dropIfExists('produits'); 
    }
};
