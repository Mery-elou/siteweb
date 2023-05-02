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
        Schema::create('categoriesfournisseurs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_fournisseur');
            $table->unsignedBigInteger('id_categorie');
            $table->foreign('id_fournisseur')->references('id')->on('fournisseurs');
            $table->foreign('id_categorie')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoriesfournisseurs');
        Schema::dropIfExists('fournisseurs');
        Schema::dropIfExists('categories');
    }
};
