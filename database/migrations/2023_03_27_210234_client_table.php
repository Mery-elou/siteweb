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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('Nom',100);
            $table->string('Prenom',100);
            $table->string('Email',100);
            $table->string('Password',100);
            $table->string('Adresse',150);
            $table->integer('Age')->nullable();
            $table->string('Telephone');
            
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
        
    }
};
