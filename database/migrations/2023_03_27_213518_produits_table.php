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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_Produit');
            $table->string('Description')->nullable();
            $table->double('Prix');
            $table->double('Quantite');
            $table->string('image')->nullable();
            $table->double('id_achat');
            $table->double('DatePromotion');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
       
    }
};
