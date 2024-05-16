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
        Schema::create('module_filiers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('module_id',false,true);
            $table->bigInteger('filier_id',false,true);
            $table->bigInteger('classe_id',false,true);
            $table->timestamps();
            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('filier_id')->references('id')->on('filiers');
            $table->foreign('classe_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_filiers');
    }
};
