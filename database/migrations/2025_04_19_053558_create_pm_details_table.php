<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pm_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pm_detail_category')->constrained('pm_detail_category')->onDelete('cascade');
            $table->foreignId('id_asset_list')->constrained('assets_list')->onDelete('cascade');
            $table->date('pm_start')->nullable();
            $table->date('pm_due')->nullable();
            $table->string('pm_status')->nullable();
            $table->string('performed_by')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pm_details');
    }
};
