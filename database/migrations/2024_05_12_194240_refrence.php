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
     
          Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('role_id',false,true)->nullable();
            $table->bigInteger('departement_id',false,true)->nullable();
            $table->bigInteger('filier_id',false,true)->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('departement_id')->references('id')->on('departements');
            $table->foreign('filier_id')->references('id')->on('filiers');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
