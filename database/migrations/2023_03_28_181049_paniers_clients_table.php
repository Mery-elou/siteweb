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
        Schema::create('paniersclients', function (Blueprint $table) {
           $table->unsignedBigInteger('id_panier');
           $table->unsignedBigInteger('id_client');
            $table->foreign('id_panier')->references('id')->on('paniers');
            $table->foreign('id_client')->references('id')->on('clients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paniersclients');
        Schema::dropIfExists('paniers');
        Schema::dropIfExists('clients');
    }
};
