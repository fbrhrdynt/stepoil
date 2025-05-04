<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pm_detail_category', function (Blueprint $table) {
            $table->id();
            $table->string('pm_name');
            $table->integer('frequency');
            $table->string('frequency_unit');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pm_detail_category');
    }
};
