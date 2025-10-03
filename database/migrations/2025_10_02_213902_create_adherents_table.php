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
        Schema::create('adherents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');
            $table->date('date_naissance')->nullable();
            $table->string('sexe')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telephone')->nullable();
            $table->text('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->string('niveau_etude')->nullable();
            $table->string('profession')->nullable();
            $table->string('photo')->nullable();
            $table->date('date_adhesion')->nullable();
            $table->string('statut')->default('Inactif');
            $table->integer('famille_id'); // FK vers familles
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adherents');
    }
};
