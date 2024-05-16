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
        Schema::create('filiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('cordinateur_id',false,true);
            $table->bigInteger('departement_id',false,true);
            $table->timestamps();
            $table->foreign('cordinateur_id')->references('id')->on('users');
            $table->foreign('departement_id')->references('id')->on('departements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filiers');
    }
};
