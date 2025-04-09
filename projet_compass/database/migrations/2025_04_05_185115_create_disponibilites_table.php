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
        Schema::create('disponibilites', function (Blueprint $table) {
            $table->id();
            $table->enum('jourSemaine', ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'])->default('Lundi');
            $table->enum('heure', [
                '8h00',
                '9h00',
                '10h00',
                '11h00',
                '12h00',
                '13h00',
                '14h00',
                '15h00',
                '16h00',
                '17h00',
                '18h00',
                '19h00',
                '20h00',
                '21h00',
                '22h00'
            ])->default('8h00');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilites');
    }
};
