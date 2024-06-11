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
        Schema::create('score_validates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id',false,true);
            $table->bigInteger('module_id',false,true);
            $table->float('score_ds')->nullable();
            $table->float('score_final')->nullable();
            $table->bigInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('student_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_validates');
    }
};