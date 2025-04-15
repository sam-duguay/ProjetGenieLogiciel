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
        Schema::create('rencontres', function (Blueprint $table) {
            $table->id();

            //$table->foreignId('disponibilite_id');
            //$table->foreignId('personne_id');

            $table->unsignedBigInteger('personne1_id');
            $table->unsignedBigInteger('personne2_id');
            $table->unsignedBigInteger('disponibilite_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('personne1_id')->references('id')->on('personnes');
            $table->foreign('personne2_id')->references('id')->on('personnes');
            $table->foreign('disponibilite_id')->references('id')->on('disponibilites');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencontres');
    }
};
