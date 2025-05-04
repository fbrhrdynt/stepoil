<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assets_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pm_category')->constrained('pm_categories')->onDelete('cascade');
            $table->string('asset_name', 255);
            $table->string('mfg_sn');
            $table->string('company_asset');
            $table->string('coc')->nullable();
            $table->string('status')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets_list');
    }
};
