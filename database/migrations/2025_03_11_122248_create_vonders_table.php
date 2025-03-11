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
        Schema::create('vonders', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produit')->unsigned();
            $table->foreign('id_produit')->references('id')->on('produits');
            $table->integer('id_rayon')->unsigned();
            $table->foreign('id_rayon')->references('id')->on('rayons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vonders');
    }
};
