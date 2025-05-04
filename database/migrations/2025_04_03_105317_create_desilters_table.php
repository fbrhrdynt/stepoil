<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desilters', function (Blueprint $table) {
            $table->id('id_desilter');
            $table->unsignedBigInteger('id_wellinfo');
            $table->integer('run_hour')->nullable();
            $table->string('feed_rate')->nullable();
            $table->string('feed_dens')->nullable();
            $table->string('overflow_dens')->nullable();
            $table->string('underflow_dens')->nullable();
            $table->string('vol_discharge')->nullable();
            $table->string('mudoncuttings')->nullable();
            $table->string('volmud_discharge')->nullable();
            $table->string('head_pressure')->nullable();
            $table->timestamps();

            $table->foreign('id_wellinfo')->references('id_wellinfo')->on('wellinfo')->onDelete('cascade');
        });

        // Insert dummy data saat migrasi
        DB::table('desilters')->insert([
            'id_wellinfo'        => 1,
            'run_hour'           => 0,
            'feed_rate'          => '0',
            'feed_dens'          => '0',
            'overflow_dens'      => '0',
            'underflow_dens'     => '0',
            'vol_discharge'      => '0',
            'mudoncuttings'      => '0',
            'volmud_discharge'   => '0',
            'head_pressure'      => '0',
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('desilters');
    }
};
