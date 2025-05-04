<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cuttingsbypassed', function (Blueprint $table) {
            $table->id('id_cuttingbypassed');
            $table->unsignedBigInteger('id_wellinfo');
            $table->float('percentage')->nullable();
            $table->float('volume')->nullable();
            $table->float('from_depth')->nullable();
            $table->string('each_from_depth')->nullable();
            $table->float('to_depth')->nullable();
            $table->string('each_to_depth')->nullable();
            $table->timestamps();
            
            $table->foreign('id_wellinfo')->references('id_wellinfo')->on('wellinfo')->onDelete('cascade');
        });

        // 🟢 Insert dummy data saat migrasi
        DB::table('cuttingsbypassed')->insert([
            'id_wellinfo'   => 1,
            'percentage'    => 0,
            'volume'        => 0,
            'from_depth'    => 0,
            'each_from_depth' => 'Feet',
            'to_depth'      => 0,
            'each_to_depth' => 'Metre',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        
    }

    public function down(): void
    {
        Schema::dropIfExists('cuttingsbypassed');
    }
};
