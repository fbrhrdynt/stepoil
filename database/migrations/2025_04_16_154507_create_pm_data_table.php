<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pm_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('file_path');
            $table->string('file_type');
            $table->unsignedBigInteger('file_size');
            $table->unsignedInteger('id_user');
            $table->timestamps();
    
            // Relasi ke pm_categories
            $table->foreign('category_id')->references('id')->on('pm_categories')->onDelete('cascade');
    
            // Relasi ke xusers
            $table->foreign('id_user')->references('id_user')->on('xusers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pm_data');
    }
};
