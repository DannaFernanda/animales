<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('adopciones', function (Blueprint $table) {
            $table->text('enfermedades')->change(); // Cambiar a text o longText
            $table->text('vacunas')->change(); // Cambiar a text o longText
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('adopciones', function (Blueprint $table) {
            //
        });
    }
};
