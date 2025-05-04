<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dailywaste', function (Blueprint $table) {
            $table->id('id_dailywaste');
            $table->unsignedBigInteger('id_wellinfo');
            $table->float('dailywaste_generated')->nullable();
            $table->float('avg_moc')->nullable();
            $table->float('avg_discharge')->nullable();
            $table->timestamps();
            
            $table->foreign('id_wellinfo')->references('id_wellinfo')->on('wellinfo')->onDelete('cascade');
        });

        // 🟢 Insert dummy data saat migrasi
        DB::table('dailywaste')->insert([
            'id_wellinfo'   => 1,
            'dailywaste_generated'    => 0,
            'avg_moc'        => 0,
            'avg_discharge'    => 0,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('dailywaste');
    }
};
