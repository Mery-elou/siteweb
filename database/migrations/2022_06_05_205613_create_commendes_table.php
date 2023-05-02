<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commendes', function (Blueprint $table) {
            $table->id('id_commende');
            $table->string('nom_produit');
            $table->float('prix');
            $table->integer('Quantite');
            $table->string('path')->default('default.png');
           $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commendes');
    }
};
