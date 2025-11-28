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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {Schema::create('animais', function (Blueprint $table) {
    $table->id();
    $table->string('nome');
    $table->foreignId('especie_id')->nullable()->constrained('especies')->nullOnDelete();
    $table->integer('idade')->nullable();
    $table->string('foto')->nullable();
    $table->timestamps();
});

        Schema::dropIfExists('animals');
    }
};
