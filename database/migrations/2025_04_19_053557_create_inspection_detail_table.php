<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inspection_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_inspection');
            $table->foreign('id_inspection')->references('id_inspection')->on('inspection_category')->onDelete('cascade');      
            $table->foreignId('id_asset_list')->constrained('assets_list')->onDelete('cascade');
            $table->date('inspection_date')->nullable();
            $table->date('inspection_exp')->nullable();
            $table->string('cert')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspection_detail');
    }
};
