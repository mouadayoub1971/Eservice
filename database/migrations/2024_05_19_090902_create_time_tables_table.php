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
        Schema::create('time_tables', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->bigInteger('module_filier_id',false,true);
            $table->bigInteger('filier_id',false,true);
            $table->bigInteger('classe_id',false,true);
            $table->timestamps();
            $table->foreign('module_filier_id')->references('id')->on('module_filiers');
            $table->foreign('filier_id')->references('id')->on('filiers');
            $table->foreign('classe_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_tables');
    }
};
